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

    public static function filterAndPaginate($search)
    {
        return CatalogImage::description($search)
            ->orderBy('id','DESC')->paginate(5);
    }

    public function scopeDescription($query, $search) {
        if(trim($search) != '') {
            return $query
                ->where('image_description','LIKE',"%$search%");
        }
    }

    public static function filterAndPaginateUnorder($search)
    {
        return CatalogImage::description($search)
            ->orderByRaw('RAND()')->paginate(5);
    }

}
