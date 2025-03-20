<?php

namespace App\Http\Controllers;

use App\Models\Highlight;
use Illuminate\Http\Request;
use Intervention\Image\Colors\Rgb\Channels\Red;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class HighlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $newdata = new Highlight;

        $newdata->product_id = $request->product_id;
        $newdata->title = $request->title;
        $newdata->price = $request->price;
        $newdata->description = $request->description;

        if ($request->hasFile('highlightimage')) {
            $image = $request->file('highlightimage');
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

            $newdata->image = $imageName . '.webp';
        }
        $newdata->save();

        return response()->json($newdata);
        
        // return redirect()->back()->with('highlight', 'highlight');
    }

    /**
     * Display the specified resource.
     */
    public function show(Highlight $highlight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Highlight $highlight)
    {
        //
    }

    public function available(Request $request, $id) {
        $highlight = Highlight::find($id);

        $highlight->available = !$highlight->available;

        $highlight->save();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Highlight $highlight)
    {
        // dd($request);
        if ($highlight) {
            $highlight->title = $request->title;
            $highlight->price = $request->price;
            $highlight->description = $request->description;
    
            if ($request->hasFile('highlightimage')) {
                if ($highlight->image) {
                    $path = public_path('storage/images/product/highlight/' . $highlight->image);
    
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
                $image = $request->file('highlightimage');
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
    
                $highlight->image = $imageName . '.webp';
            }
            $highlight->save();

        } else {
            return response()->json([
                'message' => 'Data tidak bisa di update.'.$highlight
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Highlight $highlight)
    {
        // Delete the main product image if it exists
        $path = public_path('storage/images/product/highlight/' . $highlight->image);
        if (file_exists($path)) {
            unlink($path);
        }

        // Finally, delete the product
        $highlight->delete();

        return redirect()->back()->with('highlight', 'highlight');
    }
}
