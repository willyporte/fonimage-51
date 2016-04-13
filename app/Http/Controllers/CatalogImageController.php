<?php

namespace App\Http\Controllers;

use App\CatalogImage;
use App\Http\Requests\CreateImageRequest;
use App\Http\Requests\EditImageRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class CatalogImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $images = CatalogImage::filterAndPaginate($request->get('search'));
        return view('catalog.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateImageRequest $request)
    {
        // imgs names

        $image_extension = $request->file('image_file')->getClientOriginalExtension();
        $image_name = time() . '.' . $image_extension;
        $image_thumbnail = 'thumb-'.$image_name;
        // paths
        $image_path = '/catalog/images/';
        $image_thumbnail_path = '/catalog/thumbnails/';

        $image = new CatalogImage([
            'is_active' => $request->get('is_active'),
            'image_name' => $image_name,
            'image_path' => $image_path,
            'image_thumbnail' => $image_thumbnail,
            'image_thumbnail_path' => $image_thumbnail_path,
            'image_title' => $request->get('image_title'),
            'image_description' => $request->get('image_description')
        ]);


        $image->save();

        $file = $request->file('image_file');
        $imageFile = Image::make($file->getRealPath());

        // cambio orientacion segun Exif propiedad "Orientation"
        $data = $imageFile->exif();
        if(isset($data['Orientation'])) {
            $orientation = $data['Orientation'];
            switch ($orientation) {
                case 3:
                    $imageFile = $imageFile->rotate(180);
                    break;
                case 6:
                    $imageFile = $imageFile->rotate(-90);
                    break;
                case 8:
                    $imageFile = $imageFile->rotate(90);
                    break;
            }
        }

        $w = $imageFile->width();
        $h = $imageFile->height();

        // constraint to with 800px max or height 800px max
        if( $w > $h ) {
            $imageFile->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }
        else {
            $imageFile->resize(null, 800, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }

        $imageFile->save(public_path().$image_path.$image_name)
                ->orientate()
                ->resize(150,150)
                ->save(public_path().$image_thumbnail_path.$image_thumbnail);

        Session::flash('message','Nuova Immagine Caricata!');
        return redirect()->route('catalogo.show',[$image->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = CatalogImage::findOrFail($id);
        return view('catalog.show',compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = CatalogImage::findOrFail($id);
        return view('catalog.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditImageRequest $request, $id)
    {
        $image = CatalogImage::findOrFail($id);
        $image->fill($request->all());
        $image->save();
        Session::flash('message','Item Aggiornato!');
        Session::flash('flash_type','alert-success');
        return redirect()->route('catalogo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $image = CatalogImage::findOrFail($id);
        $image->delete();

        // borrar archivos
        // image_path : /catalog/images/
        // image_name : 1459789529.png

        // image_thumbnail_path: /catalog/thumbnails/
        // image_thumbnail: thumb-1459789529.png
        //dd('public' . $image->image_path . $image->image_name);
        @unlink(public_path() . $image->image_path . $image->image_name);
        @unlink(public_path() .$image->image_thumbnail_path . $image->image_thumbnail);

        Session::flash('message', 'Item CANCELLATO!');
        Session::flash('flash_type','alert-success');

        return redirect()->route('catalogo.index');
    }
}
