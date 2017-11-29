<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Indiesoft\LaravelUploads\LaravelUploads;

class ProductPhoto extends Model
{
    use LaravelUploads;
    
    protected $table = 'product_photos';

    protected $fillable = ['product_id', 'img' ];

    protected $uploads = [
        'img' => [
            'extensions' => 'jpg,jpeg,png',
            'preview'    => '45x67',
            'thumb'      => '96x144',
            'cart'       => '81x122',
            'modal'      => '90x94',
            'listing'    => '264x231',
            'kit'        => '264x231',
            'detail'     => '384x328',
            'big'        => '1390x1200'
        ],
    ];

    public static $rules = ['img' => 'image'];
}
