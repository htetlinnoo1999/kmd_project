<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductContract;

class ProductRepository extends BaseRepository implements ProductContract
{

    public function model()
    {
        return Product::class;
    }

    public function withRelations($relations = null)
    {
        return Product::when($relations, function ($query) use ($relations) {
            return $query->with($relations);
        });
    }
}
