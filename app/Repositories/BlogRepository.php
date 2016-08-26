<?php

namespace App\Repositories;

use SebastianBerc\Repositories\Repository;
use App\Models\Blog;

class BlogRepository extends Repository
{
    public function takeModel()
    {
        return Blog::class;
    }
}
