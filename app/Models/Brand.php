<?php

namespace App\Models;

use App\Models\Traits\ModelHavePhoto;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use ModelHavePhoto;
    //
    protected $fillable = [
        'name',
        'logo'
    ];

    protected function photos(): array
    {
        return [
            'logo'
        ];
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
