<?php

namespace App\Models;

use App\Models\Traits\ModelHavePhoto;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use ModelHavePhoto;
    protected $fillable = [
        'name',
        'photo'
    ];

    protected function photos(): array
    {
        return [
          'photo'
        ];
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
