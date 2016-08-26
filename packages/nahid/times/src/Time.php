<?php

namespace Nahid\Times;

use Carbon\Carbon;

class Time
{
    public function makeAgo($time)
    {
        $dt = new Carbon($time);
        $now = $dt->now();

        return $dt->diffForHumans($now, true);
    }
}
