<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client as GoutteCleint;
// For goutte Version >= 4.0.0
use Symfony\Component\HttpClient\HttpClient;
// For goutte Version <= 4.0.0 (i.e from 0.1.0 to 3.3.1)
use GuzzleHttp\Client as GuzzleClient;

class ScrapController extends Controller
{
    function scrap()
    {
        // For goutte Version >= 4.0.0
        $goutteClient = new GoutteCleint(HttpClient::create(['timeout' => 60]));

        // For goutte Version <= 4.0.0 (i.e from 0.1.0 to 3.3.1)
        // $goutteClient = new GoutteCleint();
        // $guzzleClient = new GuzzleClient(['timeout' => 60]);
        // $goutteClient->setClient($guzzleClient);

        $crawler = $goutteClient->request('GET', 'https://duckduckgo.com/html/?q=Laravel');
        $crawler->filter('.result__title .result__a')->each(function ($node) {
            dump($node->text());
        });
    }

    function scrapKazeno()
    {
        $goutteClient = new GoutteCleint(HttpClient::create(['timeout' => 60]));

        $crawler1 = $goutteClient->request('GET', 'https://kazeno.tobita-shinchi.love/info/?%E3%83%84%E3%82%A4%E3%83%BC%E3%83%88%E3%83%A9%E3%83%B3%E3%82%AD%E3%83%B3%E3%82%B0%EF%BC%88%E9%80%B1%E9%96%93%EF%BC%89');
        $crawler1->filter("div.ie5 table.style_table tbody tr td.style_td strong a[rel='nofollow']")->each(function ($node, $count) use ($goutteClient) {
            $count++;
            $href = $node->attr('href');
            echo $count,". ",$href;

            $crawler2 = $goutteClient->request('GET', "$href");
            $crawler2->filter("div.ie5 table.style_table tbody tr td.style_td a[rel='nofollow']")->each(function ($node) {
                dump($node->text());
            });

            $count == 5 ? exit : '';
        });
    }
}
