<?php

namespace App\Http\Controllers;

use App\CatalogImage;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $images = CatalogImage::filterAndPaginateUnorder($request->get('search'));
        return view('gallery', compact('images'));
    }

    public function show($id) {
        $image = CatalogImage::findOrFail($id);
        return view('client-show',compact('image'));
    }
}
