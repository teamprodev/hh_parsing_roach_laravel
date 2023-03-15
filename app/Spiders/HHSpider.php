<?php

namespace App\Spiders;

use Generator;
use RoachPHP\Downloader\Middleware\RequestDeduplicationMiddleware;
use RoachPHP\Extensions\LoggerExtension;
use RoachPHP\Extensions\StatsCollectorExtension;
use RoachPHP\Http\Request;
use RoachPHP\Http\Response;
use RoachPHP\Roach;
use RoachPHP\Spider\BasicSpider;
use RoachPHP\Spider\Configuration\Overrides;
use RoachPHP\Spider\ParseResult;

class HHSpider extends BasicSpider
{
    public array $startUrls = [

    ];

    public array $downloaderMiddleware = [
        RequestDeduplicationMiddleware::class,
    ];

    public array $spiderMiddleware = [
        //
    ];

    public array $itemProcessors = [
        //
    ];

    public array $extensions = [
        LoggerExtension::class,
        StatsCollectorExtension::class,
    ];

    public int $concurrency = 2;

    public int $requestDelay = 1;

    /**
     * @return Generator<ParseResult>
     */
    public function parse(Response $response): Generator
    {

        $link = $response->filter('a[class="sidebar-nav-link"]')->links();
        $arr = [];
        $i = 0;
        foreach ($link as $item) {
            $arr[$i] = $item->getUri();
            $i++;
        }
        Roach::startSpider(AssessmentSpider::class, context: ['link' => $arr[4]]);
        yield $this->item([
            'sleep' => 'sleep'
        ]);
    }

    protected function initialRequests(): array
    {
        $r = new Request(
            'GET',
            "https://tashkent.hh.uz/employer/vacancyresponses?vacancyId=67711786&hhtmFrom=vacancy",
            [$this, 'parse']
        );

        $r = $r->addHeader('cookie', array("hhul=8e895e4ca6f9a44d4e8b415ead78bfb025600f18c580684b7daf349c69720cff; hhtoken=PYQimPv7sC72CiNzqxolfCfhib3d; hhrole=employer;"));

        return [$r
        ];
    }
}
