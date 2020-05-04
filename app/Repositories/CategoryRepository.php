<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryContract;

class CategoryRepository extends BaseRepository implements CategoryContract {

    public function model()
    {
        return Category::class;
    }

    public function withRelations($relations = null)
    {
        return Category::when($relations, function ($query) use ($relations){
            return $query->with($relations);
        });
    }
}
