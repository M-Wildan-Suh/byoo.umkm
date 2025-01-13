<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Response;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Str;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemapPath = public_path('sitemap.xml');

        // Periksa apakah file sitemap ada
        if (file_exists($sitemapPath)) {
            return Response::make(file_get_contents($sitemapPath), 200, [
                'Content-Type' => 'application/xml', // Pastikan MIME type untuk XML
            ]);
        }

        // Jika file sitemap tidak ada, buat file sitemap terlebih dahulu
        $sitemap = Sitemap::create()
            ->add(Url::create('/')->setLastModificationDate(now()))
            ->add(Url::create('/product')->setLastModificationDate(now()));

            foreach (Product::all() as $model) {
                $slug = Str::slug($model->name, '-');
                $sitemap->add(Url::create("/{$slug}")->setLastModificationDate($model->updated_at));
            }

        $sitemap->writeToFile($sitemapPath);

        return response()->download($sitemapPath);
    }
}

