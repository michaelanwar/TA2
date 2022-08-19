<?php
defined('BASEPATH') or exit('No direct script access allowed');

// get day and month from timestamp
function get_day($timestamp)
{
    $day = date('d', strtotime($timestamp));
    $month = date('M', strtotime($timestamp));
    $cstring = $day . ' ' . $month;
    return $cstring;
}