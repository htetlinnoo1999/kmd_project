<?php
namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\OrderContract;

class OrderRepository extends BaseRepository implements OrderContract {

    public function model()
    {
        return Order::class;
    }

    public function withRelations($relations = null)
    {
        return Order::when($relations, function ($query) use ($relations) {
            return $query->with($relations);
        });
    }
}
