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
    function scrapDuckduckgo()
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

        $href1 = 'https://kazeno.tobita-shinchi.love/info/?%E3%82%B7%E3%83%A7%E3%83%83%E3%83%97';
        $crawler1 = $goutteClient->request('GET', $href1);
        $crawler1->filter("div.ie5 table.style_table tbody tr td.style_td a[rel='nofollow']")->each(function ($node1) use ($goutteClient) {
            $href2 = $node1->attr('href');

            $crawler2 = $goutteClient->request('GET', $href2);
            $crawler2->filter("div.ie5 table.style_table tbody tr td.style_td strong a[rel='nofollow']")->each(function ($node2) use ($goutteClient) {
                $href3 = $node2->attr('href');

                $crawler3 = $goutteClient->request('GET', $href3);
                $crawler3->filter("div.ie5 table.style_table tbody tr td.style_td a[rel='nofollow']")->each(function ($node3, $count) use ($goutteClient) {
                    $href4 = $node3->attr('href');
                    $count++;
                    echo $count.". ".$href4;
                    $crawler4 = $goutteClient->request('GET', $href4);
                    $crawler4->filter("div.ie5 table.style_table tbody tr td.style_td a[rel='nofollow']")->each(function ($node4, $count) {
                        dump($node4->text());
                    });
                    $count == 5 ? exit : "";
                });
            });
        });
    }
}
