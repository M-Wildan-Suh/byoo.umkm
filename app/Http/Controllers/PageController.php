<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\Category;
use App\Models\Highlight;
use App\Models\NoHandphone;
use App\Models\PivotProductTag;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\ProductTag;
use App\Models\Template;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class PageController extends Controller
{
    public function home(Request $request) {
        // dd($request->filter);
        $no_tlp = NoHandphone::first()->no_tlp;
        $no_tlp = preg_replace('/^0/', '+62', $no_tlp);
        $data = Product::where('status', 'active')->inRandomOrder()->get();
        return view('welcome', compact('data', 'no_tlp'));
    }

    public function product(Request $request) {
        // dd($request->filter);
        $no_tlp = NoHandphone::first()->no_tlp;
        $no_tlp = preg_replace('/^0/', '+62', $no_tlp);
        if ($request->search) {
            $data = Product::where('status', 'active')->where('name', 'like', '%' . $request->search . '%')->inRandomOrder()->get();
        } else {
            $data = Product::where('status', 'active')->inRandomOrder()->get();
        }
        $category = Category::all();
        $template = Template::inRandomOrder()->get();
        return view('product', compact('data', 'no_tlp', 'template', 'category'));
    }

    public function categorybusiness($category) {
        $no_tlp = NoHandphone::first()->no_tlp;
        $no_tlp = preg_replace('/^0/', '+62', $no_tlp);

        $filter = $category;

        $category = Category::where('category', $category)->first();

        $data = Product::whereHas('category', function ($query) use ($category) {
            $query->where('category_id', $category->id);
        })->get();

        $category = Category::all();
        $template = Template::inRandomOrder()->get();
        return view('product', compact('data', 'no_tlp', 'template', 'category', 'filter'));
    }

    public function template(Request $request) {
        $no_tlp = NoHandphone::first()->no_tlp;
        $no_tlp = preg_replace('/^0/', '+62', $no_tlp);
        if ($request->search) {
            $data = Template::where('name', 'like', '%' . $request->search . '%')->get();
        } else {
            $data = Template::all();
        }
        $data = $data->map(function ($item) {
            $item->slug = Str::slug($item->name, '-');
            return $item;
        });
        return view('template', compact('data', 'no_tlp'));
    }

    public function detail($slug) {
        $data = Product::where('slug', $slug)->first();
        
        if (!$data) {
            return view('not-found');
        }

        $template = Template::find($data->template_id);

        $role = Access::where('product_id', $data->id)->first();

        // Role Validation
        if ($role) {
            // No Telephone
            if ($role->user->role === 'premium') {
                $no_tlp = $data->no_tlp;
            } else {
                $no_tlp = NoHandphone::first()->no_tlp;
            }
            $role = $role->user->role;
        } else {
            $no_tlp = NoHandphone::first()->no_tlp;

            $role = 'admin';
        }

        $data->image = asset('storage/images/product/'. $data->image);

        $data->productGallery = $data->productGallery->map(function ($item) {
            $item->image = asset('storage/images/product/gallery/'. $item->image);
            return $item;
        });
        
        $data->productHighlight = $data->productHighlight->map(function ($item) {
            $item->image = asset('storage/images/product/highlight/'. $item->image);
            return $item;
        });

        if (!$data) {
            return redirect()->route('home');
        }

        $no_tlp = preg_replace('/^0/', '+62', $no_tlp);

        // Url Youtube
        $url = $data->youtube;
        $parsedUrl = parse_url($url);
        $videoId = null;

        if (isset($parsedUrl['host'])) {
            if ($parsedUrl['host'] === 'youtu.be') {
                // Jika URL menggunakan youtu.be, ambil ID dari path
                $videoId = ltrim($parsedUrl['path'], '/');
            } elseif (strpos($parsedUrl['host'], 'youtube.com') !== false) {
                // Jika URL menggunakan youtube.com, periksa path dan query
                if (strpos($parsedUrl['path'], '/shorts/') === 0) {
                    // Jika URL adalah Shorts, ambil ID dari path
                    $videoId = ltrim(str_replace('/shorts/', '', $parsedUrl['path']), '/');
                } elseif (isset($parsedUrl['query'])) {
                    // Jika URL menggunakan query, ambil ID dari parameter 'v'
                    parse_str($parsedUrl['query'], $query);
                    $videoId = $query['v'] ?? null;
                }
            }
        }

        // Buat embed URL jika ID ditemukan
        $data->embed = $videoId ? "https://www.youtube.com/embed/" . $videoId : $data->youtube;

        return view('detail', compact('data', 'no_tlp', 'role', 'template'));

    }

    public function createproduct() {
        $tag = ProductTag::all();
        $product = Product::all();
        return view('create-product', compact('tag', 'product'));
    }

    public function storeproduct(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:'.Product::class,
            'subtitle' => 'required|string|max:255',
            'desc' => 'required|string',
            'no_tlp' => 'required|string|max:20',
            'thumbnail' => 'required|image',
        ]);
    
        // Jika validasi gagal, kirim alert dan kembali
        if ($validator->fails()) {
            return redirect()->back()->with('alert', 'Terjadi kesalahan validasi: ' . implode(', ', $validator->errors()->all()));
        }

        $newdata= new Product();

        $newdata->name = $request->name;
        $newdata->slug = Str::slug($newdata->name);
        $newdata->subtitle = $request->subtitle;
        $newdata->template_id = 1;
        $newdata->description = $request->desc;
        $newdata->no_tlp = $request->no_tlp;

        if ($request->hasFile('thumbnail')) {
            $imageFile = $request->file('thumbnail');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imagePath = public_path('storage/images/product/');

            $manager = new ImageManager(new Driver());
            $image = $manager->read($imageFile->getPathname());
            $imageFullPath = $imagePath . $imageName . '.webp';
            $image->save($imageFullPath);

            $newdata->image = $imageName . '.webp';
        }

        $newdata->save();

        if ($request->tag) {
            foreach ($request->tag as $item) {
                $tag = ProductTag::where('tag', $item)->first();
                
                if ($tag) {
                    $newpivot = new PivotProductTag;
    
                    $newpivot->tag_id = $tag->id;
                    $newpivot->product_id = $newdata->id;
    
                    $newpivot->save();
                } else {
                    $newtag = new ProductTag;

                    $newtag->tag = ucfirst($item);

                    $newtag->save();

                    $newpivot = new PivotProductTag;
    
                    $newpivot->tag_id = $newtag->id;
                    $newpivot->product_id = $newdata->id;
    
                    $newpivot->save();
                }
                
            }
        }

        if ($request->inputs) {
            foreach ($request->inputs as $index => $item) {
                $newhighlight = new Highlight;

                $newhighlight->product_id = $newdata->id;
                $newhighlight->title = $item['title'];
                $newhighlight->description = $item['description'];

                if ($request->hasFile('inputs.'.$index.'.image')) {
                    $image = $request->file('inputs.'.$index.'.image');
                    // Get the original filename without the extension
                    $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                    
                    // Add the current date to the filename
                    $currentDate = now()->format('YmdHis');
                    
                    // Create a new image name
                    $imageName = $originalName . '_' . $currentDate;
                    
                    // Define the image storage path
                    $imagePath = public_path('storage/images/product/highlight/');
                    
                    $manager = new ImageManager(new Driver());
                    $imageOptimized = $manager->read($image->getPathname());
                    $imageFullPath = $imagePath . $imageName . '.webp';
                    $imageOptimized->save($imageFullPath);

                    $newhighlight->image = $imageName . '.webp';
                }
                $newhighlight->save();
            }
        }

        if ($request->file('image_gallery')) {
            foreach ($request->file('image_gallery') as $item) {
                $newgallery = new ProductGallery;
                $newgallery->product_id = $newdata->id;
                if ($item) {
                    $imageFile = $item;
                    $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
                    $imagePath = public_path('storage/images/product/gallery/');
        
                    $manager = new ImageManager(new Driver());
                    $image = $manager->read($imageFile->getPathname());
                    $imageFullPath = $imagePath . $imageName . '.webp';
                    $image->save($imageFullPath);
        
                    $newgallery->image = $imageName . '.webp';
                }
                $newgallery->save();
            }
        }

        $no_tlp = NoHandphone::first()->no_tlp;
        $no_tlp = preg_replace('/^0/', '+62', $no_tlp);

        $text = urlencode("Halo, saya sudah mendaftarkan usaha Saya dengan nama usaha ".$newdata->name." dan email saya ".Auth::user()->email.". Saya tertarik dengan fitur-fitur yang ada dan ingin mengetahui lebih lanjut. Apakah bisa mendapatkan informasi lebih lengkap?");

        return redirect()->away('https://wa.me/'.$no_tlp.'?text=' . $text);
    }

    public function order(Request $request, $no_tlp) {
        $data = Highlight::whereIn('id', $request->order)->get();

        // dd($data);
        // $no_tlp = NoHandphone::first()->no_tlp;
        // $no_tlp = preg_replace('/^0/', '+62', $no_tlp);

        $message = "Halo, saya ingin memesan produk/layanan Anda.";

        foreach ($data as $item) {
            $message .= "\n- ". $item->title;
        }

        $message .= "\nUntuk produk/layanan diatas apakah masih tersedia?";
        $whatsappUrl = "https://wa.me/{$no_tlp}?text=" . urlencode($message);

        return redirect()->away($whatsappUrl);
    }
}
