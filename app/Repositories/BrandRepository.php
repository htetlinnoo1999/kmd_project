<?php

namespace App\Repositories;

use App\Models\Brand;
use App\Repositories\Contracts\BrandContract;

class BrandRepository extends BaseRepository implements BrandContract {

    public function model()
    {
        return Brand::class;
    }

    public function withRelations($relations = null)
    {
        return Brand::when($relations, function($query) use ($relations) {
            return $query->with($relations);
        });
    }
}
