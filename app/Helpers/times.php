<?php
use Carbon\Carbon;

function makeAgo($time)
{
    $dt = new Carbon($time);
    $now = $dt->now();

    return $dt->diffForHumans($now, true);
}
