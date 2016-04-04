<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogImage extends Model
{
    protected $table = 'catalog_images';
    protected $fillable =
        [
            'is_active',
            'image_name',
            'image_path',
            'image_extension',
            'image_thumbnail',
            'image_thumbnail_path',
            'image_thumbnail_extension',
            'image_title',
            'image_description',
            'quantity',
            'price'
        ];
}
