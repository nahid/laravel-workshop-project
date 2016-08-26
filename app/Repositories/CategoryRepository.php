<?php

namespace App\Repositories;

use SebastianBerc\Repositories\Repository;
use App\Models\Category;

class CategoryRepository extends Repository
{
    public function takeModel()
    {
        return Category::class;
    }
}
