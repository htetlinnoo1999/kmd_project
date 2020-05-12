<?php
namespace App\Repositories\Contracts;

interface OrderContract {
    public function withRelations($relations = null);
}
