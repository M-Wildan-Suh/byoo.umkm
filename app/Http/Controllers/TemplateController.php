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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Template::all();
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
        $newdata= new Template();

        $newdata->name = $request->name;
        $newdata->subtitle = $request->subtitle;
        $newdata->price = $request->price;
        $newdata->template = $request->template;
        $newdata->description = $request->description;
        $newdata->address = $request->address;
        $newdata->no_tlp = $request->no_tlp;
        $newdata->youtube = $request->link;
        $newdata->home_button = $request->home_button;
        $newdata->status = 'active';

        if ($request->hasFile('thumbnail')) {
            $imageFile = $request->file('thumbnail');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imagePath = public_path('storage/images/template/');

            $manager = new ImageManager(new Driver());
            $image = $manager->read($imageFile->getPathname());
            $imageFullPath = $imagePath . $imageName . '.webp';
            $image->save($imageFullPath);

            $newdata->image = $imageName . '.webp';
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
        //
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
