<?php

namespace App\Spiders;

use Generator;
use RoachPHP\Downloader\Middleware\RequestDeduplicationMiddleware;
use RoachPHP\Extensions\LoggerExtension;
use RoachPHP\Extensions\StatsCollectorExtension;
use RoachPHP\Http\Request;
use RoachPHP\Http\Response;
use RoachPHP\Spider\BasicSpider;
use RoachPHP\Spider\ParseResult;
use Symfony\Component\DomCrawler\Crawler;
use function Symfony\Component\String\b;

class UserSpider extends BasicSpider
{
    public array $startUrls = [
        //
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
        $full_name = $response->filter('.bloko-header-1')->text();


        print_r($full_name."\n");

        yield $this->item([]);
    }

    protected function initialRequests(): array
    {
        $r = new Request(
            'GET',
            $this->context['link'],
            [$this, 'parse']
        );

        $r = $r->addHeader('cookie', array("hhtoken=PYQimPv7sC72CiNzqxolfCfhib3d;"));

        return [$r
        ];
    }
}
