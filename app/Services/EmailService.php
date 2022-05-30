<?php

namespace App\Services;

use GuzzleHttp\Client;

class EmailService
{
    protected $client;    

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'http://api.25one.com.ua']); 
    }

    /**
     * Send Email
     *
     * @return string
     */
    public function send(string $receiver, string $text)
    {
        $response = $this->client->get('/api_mail.php', [
            'query' => [
                'email_to' => $receiver,
                'title' => 'Message from laravel-arixess',
                'message' => $text,
            ]
        ])->getBody();
        
        return (string) $response;
    }
}
