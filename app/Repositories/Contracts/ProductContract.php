<?php
namespace App\Repositories\Contracts;

interface ProductContract {

    public function withRelations($relations = null);
}
