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
}
