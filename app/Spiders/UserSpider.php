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
        echo $response->filter('.bloko-header-1')->text()."\n";

        yield $this->item([]);
    }

    protected function initialRequests(): array
    {
        $r = new Request(
            'GET',
            $this->context['link'],
            [$this, 'parse']
        );

        $r = $r->addHeader('cookie', array("regions=2759; region_clarified=NOT_SET; _gid=GA1.2.1733174742.1678712705; __ddg1_=oO3Tzq9tFLCEM1wOTaQJ; _ym_uid=167871232575476413; _ym_d=1678712794; hhuid=tz4SQqXER!3vomQPBBQ36Q--; redirect_host=tashkent.hh.uz; _xsrf=5482df6b48fc69ec6805ffc8a092399d; display=desktop; GMT=3; remember=0; _ym_isad=2; hhul=8e895e4ca6f9a44d4e8b415ead78bfb025600f18c580684b7daf349c69720cff; hhtoken=PYQimPv7sC72CiNzqxolfCfhib3d; _hi=107264427; hhrole=employer; device_breakpoint=l; _ga_LGX55EQH2G=GS1.1.c1f111a577fbe6b4d1a12775c53b114bbc1acf743b68cba12c92f86a8d7e2c2b.5.1.1678793303.58.0.0; _ga=GA1.1.1473095551.1678712590; __zzatgib-w-hh=MDA0dC0jViV+FmELHw4/aQsbSl1pCENQGC9LXzEuQmhSY3hcKElXfnopHhEIKVVQDhAUQEopeVxtIiYYOVURCxIXRF5cVWl1FRpLSiVueCplJS0xViR8SylEW1QJLCIUemsnUAsUVy8NPjteLW8PKhMjZHYhP04hC00+KlwVNk0mbjN3RhsJHlksfEspNQ9QCi5KF3tuI08KCxRCRih0LUQjHxx9WSJDEH4yV0xEem0pCQwNW0MzaWVpcC9gIBIlEU1HGEVkW0I2KBVLcU8cenZffSpBbCVmUFwiQ1lOfSwVe0M8YwxxFU11cjgzGxBhDyMOGFgJDA0yaFF7CT4VHThHKHIzd2UqO2wfZUtdIUpHSWtlTlNCLGYbcRVNCA00PVpyIg9bOSVYCBI/CyYfGH9yLFIKC18+RXVvG382XRw5YxEOIRdGWF17TEA=Tpw8Yw==; __zzatgib-w-hh=MDA0dC0jViV+FmELHw4/aQsbSl1pCENQGC9LXzEuQmhSY3hcKElXfnopHhEIKVVQDhAUQEopeVxtIiYYOVURCxIXRF5cVWl1FRpLSiVueCplJS0xViR8SylEW1QJLCIUemsnUAsUVy8NPjteLW8PKhMjZHYhP04hC00+KlwVNk0mbjN3RhsJHlksfEspNQ9QCi5KF3tuI08KCxRCRih0LUQjHxx9WSJDEH4yV0xEem0pCQwNW0MzaWVpcC9gIBIlEU1HGEVkW0I2KBVLcU8cenZffSpBbCVmUFwiQ1lOfSwVe0M8YwxxFU11cjgzGxBhDyMOGFgJDA0yaFF7CT4VHThHKHIzd2UqO2wfZUtdIUpHSWtlTlNCLGYbcRVNCA00PVpyIg9bOSVYCBI/CyYfGH9yLFIKC18+RXVvG382XRw5YxEOIRdGWF17TEA=Tpw8Yw==; cfidsgib-w-hh=E3s32c7AwB93HEUO3zPHzK9O2RTebyjtF5WG2g4RBO/E8iZcPxaHN5CTMLgK2QbiR2O//Fkp23m+SxLxYoUuwUcbFO/uOadw0LSOoUifdrqQukDd1z424t5XLruoFC6x1/gspiIamTjicMAl/8+qyCIzu//8GlfUTskvnQo=; cfidsgib-w-hh=E3s32c7AwB93HEUO3zPHzK9O2RTebyjtF5WG2g4RBO/E8iZcPxaHN5CTMLgK2QbiR2O//Fkp23m+SxLxYoUuwUcbFO/uOadw0LSOoUifdrqQukDd1z424t5XLruoFC6x1/gspiIamTjicMAl/8+qyCIzu//8GlfUTskvnQo=; cfidsgib-w-hh=E3s32c7AwB93HEUO3zPHzK9O2RTebyjtF5WG2g4RBO/E8iZcPxaHN5CTMLgK2QbiR2O//Fkp23m+SxLxYoUuwUcbFO/uOadw0LSOoUifdrqQukDd1z424t5XLruoFC6x1/gspiIamTjicMAl/8+qyCIzu//8GlfUTskvnQo=; gsscgib-w-hh=y2p2TJEjmzR1dFzxZoyrRAWZpA+RbEQYDAB9XW1hmlOU+t/L8nLSpzuJoTaSEQktzz0UdSSmkS0Sg5wjdEPVf3OVjj2D071OG/l2HwEJj26pbiUcO/+oHCMZPDrZPYQRwAUcYPvAAy+rkb7rS1lv6pT+tId9wQQYHYFi2qFUWpv2ZthcMnZhUr590nF9Dfem3mS0/fs1T7FId7TR0hL5hINSFeGWBoRI9VJCSLNp0FicHY5bioAtbZ/RRd7KvTIRjOg=; gsscgib-w-hh=y2p2TJEjmzR1dFzxZoyrRAWZpA+RbEQYDAB9XW1hmlOU+t/L8nLSpzuJoTaSEQktzz0UdSSmkS0Sg5wjdEPVf3OVjj2D071OG/l2HwEJj26pbiUcO/+oHCMZPDrZPYQRwAUcYPvAAy+rkb7rS1lv6pT+tId9wQQYHYFi2qFUWpv2ZthcMnZhUr590nF9Dfem3mS0/fs1T7FId7TR0hL5hINSFeGWBoRI9VJCSLNp0FicHY5bioAtbZ/RRd7KvTIRjOg=; fgsscgib-w-hh=X5SFe4e97fa83be9de3f53fcdbbae71e7ca5ace3; fgsscgib-w-hh=X5SFe4e97fa83be9de3f53fcdbbae71e7ca5ace3"));

        return [$r
        ];
    }
}
