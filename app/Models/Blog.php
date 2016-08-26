<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Blog extends Model
{
    protected $table = 'blogs';

    public $fillable = ['title', 'blog', 'user_id', 'category_id', 'status'];

    public function getTimeAgoAttribute()
    {
        $dt = new Carbon($this->created_at);
        $now = $dt->now();

        return $dt->diffForHumans($now, true);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
