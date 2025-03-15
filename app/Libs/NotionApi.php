<?php

namespace App\Libs;

use GuzzleHttp\Client;

class NotionApi
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.notion.com/v1/',
            'headers' => [
                'Authorization' => 'Bearer ' . config('services.notion.secret'),
                'Notion-Version' => '2022-06-28',
            ],
        ]);
    }

    public function getDatabase($databaseId)
    {
        $response = $this->client->get('databases/' . $databaseId);

        return json_decode($response->getBody()->getContents());
    }

    public function queryDatabase($databaseId)
    {
        $response = $this->client->post('databases/' . $databaseId . '/query');
        return json_decode($response->getBody()->getContents());
    }
}
