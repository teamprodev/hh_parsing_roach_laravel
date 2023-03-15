<?php

namespace App\Services;

use App\Spiders\HHSpider;
use RoachPHP\Roach;

class HHSpiderService
{
    public function parse()
    {
        Roach::startSpider(HHSpider::class);
    }
}
