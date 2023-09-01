<?php
/**
 * WA
 *
 * @copyright Copyright © 2023 Ishaarat. All rights reserved.
 * @author    Ishaarat Tech Team <sales@ishaarat.com>
 */

namespace Ishaarat\LaraIshaarat\Drivers;


use Ishaarat\LaraIshaarat\Contracts\Driver;
use GuzzleHttp\Client;
class WA extends Driver
{
    const ISHAARAT_API_URL = "https://ishaarat.com/api";
    protected Client $client;

    protected function boot(): void
    {
        $this->client = new Client();
    }
    public function send()
    {
        $response = collect();
        foreach ($this->recipients as $recipient) {
            $result = $this->client->request(
                'POST',
                self::ISHAARAT_API_URL . '/create-message',
                [
                    'json' => [
                        'appkey' => $this->settings['app_key'],
                        'to' => $recipient,
                        'message' => $this->body,
                        'template_id' => 0
                    ],
                    'headers' => [
                        'Authorization' => "Bearer " . $this->settings['auth_key'],
                    ],
                ]
            );
            $response->put($recipient, $result);
        }

        return (count($this->recipients) == 1) ? $response->first() : $response;
    }
}
