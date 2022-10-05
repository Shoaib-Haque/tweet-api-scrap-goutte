<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TweetApiController extends Controller
{
    public function followers()
    {
        $client = new \GuzzleHttp\Client();
        $id = 2244994945;
        $endpoint = "https://api.twitter.com/2/users/{$id}/followers";

        try {
            $response = $client->request('GET', $endpoint, ['headers' => [
                'authorization' =>
                'Bearer aFNqQnNMaUMwWVI5Nm1OUkp3TndINUh2aEsxRWFJeXhva1Z3N3E3aVR4VEVoOjE2NjQ5NDc0Mzk4ODU6MToxOmF0OjE'
            ]]);
            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $content = json_decode($response->getBody(), true);
                $followers = $content['data'];
                dd($followers);
            } else {
                if (env('APP_DEBUG')) {
                    dd($statusCode);
                } else {
                    echo "Error!";
                }
            }
        } catch (Exception $e) {
            if (env('APP_DEBUG')) {
                echo $e->getMessage();
            } else {
                echo "Error!";
            }
        }
    }

    public function tweets()
    {
        $client = new \GuzzleHttp\Client();
        $id = 2244994945;
        $endpoint = "https://api.twitter.com/2/users/{$id}/tweets";

        try {
            $response = $client->request('GET', $endpoint, ['headers' => [
                'authorization' =>
                'Bearer aFNqQnNMaUMwWVI5Nm1OUkp3TndINUh2aEsxRWFJeXhva1Z3N3E3aVR4VEVoOjE2NjQ5NDc0Mzk4ODU6MToxOmF0OjE'
            ]]);
            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $content = json_decode($response->getBody(), true);
                $tweets = $content['data'];
                dd($tweets);
            } else {
                if (env('APP_DEBUG')) {
                    dd($statusCode);
                } else {
                    echo "Error!";
                }
            }
        } catch (Exception $e) {
            if (env('APP_DEBUG')) {
                echo $e->getMessage();
            } else {
                echo "Error!";
            }
        }
    }
}
