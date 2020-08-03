<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use SearchableTrait;

    protected $guarded = [];

    protected $searchable = [
        'columns' => [
            'products.name'         => 10,
            'products.description'  => 10,
            'products.price'        => 10,
            'categories.name'       => 10,
        ],
        'joins' => [
            'categories' => ['products.category_id', 'categories.id']
        ],
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag', 'product_id', 'tag_id');
    }

}
