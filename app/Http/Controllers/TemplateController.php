<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\TemplateGallery;
use App\Models\TemplateHighlight;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class TemplateController extends Controller
{
    public function editimage($id, Request $request) {
        $template = Template::find($id);
        if ($request->hasFile('thumbnail')) {
            if ($template->image) {
                $path = public_path('storage/images/template/' . $template->image);

                if (file_exists($path)) {
                    unlink($path);
                }
            }
            $imageFile = $request->file('thumbnail');
            $imageName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            $imagePath = public_path('storage/images/template/');

            $manager = new ImageManager(new Driver());
            $image = $manager->read($imageFile->getPathname());
            $imageFullPath = $imagePath . $imageName . '.webp';
            $image->save($imageFullPath);

            $template->image = $imageName . '.webp';
        }
        $template->save();

        return redirect()->back();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Template::all();
        $data->transform(function ($data) {
            $data->image = asset('storage/images/template/'.$data->image);
            return $data;
        });
        return view('admin.template.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.template.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newdata = new Template;

        $newdata->name = $request->name;
        $newdata->bg_type = $request->bg_type;
        $newdata->head_type = $request->header;
        $newdata->gallery_type = $request->gallery;
        $newdata->desc_main_color = $request->desc_main_color;
        $newdata->desc_text_color = $request->desc_text_color;
        
        $newdata->product_type = $request->product_type;
        $newdata->product_main_color = $request->product_main_color;
        $newdata->product_second_color = $request->product_second_color;
        $newdata->product_text_color = $request->product_text_color;
        
        $newdata->contact_main_color = $request->contact_main_color;
        $newdata->contact_second_color = $request->contact_second_color;
        if ($newdata->bg_type === "normal") {
            $newdata->bg_main_color = $request->bg_normal_color;
        } elseif ($newdata->bg_type === "gradient") {
            $newdata->bg_main_color = $request->bg_main_color;
            $newdata->bg_second_color = $request->bg_second_color;
        } elseif ($newdata->bg_type === "image") {
            if ($request->hasFile('bg_image')) {
                $imageFile = $request->file('bg_image');
                $imageName = time();
                $imagePath = public_path('storage/images/template/background/');
    
                $manager = new ImageManager(new Driver());
                $image = $manager->read($imageFile->getPathname());
                $imageFullPath = $imagePath . $imageName . '.webp';
                $image->save($imageFullPath);
    
                $newdata->bg_image = $imageName . '.webp';
            }
        }

        $newdata->save();
          
        return redirect()->route('template.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Template $template)
    {
        return view('admin.template.edit', compact('template'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Template $template)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Template $template)
    {
        $template->name = $request->name;
        $template->bg_type = $request->bg_type;
        $template->head_type = $request->header;
        $template->gallery_type = $request->gallery;
        $template->desc_main_color = $request->desc_main_color;
        $template->desc_text_color = $request->desc_text_color;
        
        $template->product_type = $request->product_type;
        $template->product_main_color = $request->product_main_color;
        $template->product_second_color = $request->product_second_color;
        $template->product_text_color = $request->product_text_color;
        
        $template->contact_main_color = $request->contact_main_color;
        $template->contact_second_color = $request->contact_second_color;
        if ($template->bg_type === "normal") {
            $template->bg_main_color = $request->bg_normal_color;
        } elseif ($template->bg_type === "gradient") {
            $template->bg_main_color = $request->bg_main_color;
            $template->bg_second_color = $request->bg_second_color;
        } elseif ($template->bg_type === "image") {
            if ($request->hasFile('bg_image')) {
                $imageFile = $request->file('bg_image');
                $imageName = time();
                $imagePath = public_path('storage/images/template/background/');
    
                $manager = new ImageManager(new Driver());
                $image = $manager->read($imageFile->getPathname());
                $imageFullPath = $imagePath . $imageName . '.webp';
                $image->save($imageFullPath);
    
                $template->bg_image = $imageName . '.webp';
            }
        }

        $template->save();
          
        return redirect()->route('template.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Template $template)
    {
        // Delete the main template image if it exists
        $path = public_path('storage/images/template/' . $template->image);
        if (file_exists($path)) {
            unlink($path);
        }

        // Fetch associated template gallery images
        $templateGalleries = TemplateGallery::where('template_id', $template->id)->get();

        // Loop through each gallery image and delete it
        foreach ($templateGalleries as $gallery) {
            $galleryPath = public_path('storage/images/template/gallery/' . $gallery->image); // Adjust the path as needed
            if (file_exists($galleryPath)) {
                unlink($galleryPath);
            }
            // Delete the gallery record from the database
            $gallery->delete();
        }

        $highlight = TemplateHighlight::where('template_id', $template->id)->get();

        foreach ($highlight as $item) {
            $galleryPath = public_path('storage/images/template/highlight/' . $item->image); // Adjust the path as needed
            if (file_exists($galleryPath)) {
                unlink($galleryPath);
            }
            // Delete the gallery record from the database
            $gallery->delete();
        }

        // Finally, delete the template
        $template->delete();

        return redirect()->back()->with('success', 'template and its gallery images deleted successfully.');
    }
}
