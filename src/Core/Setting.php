<?php

namespace LINE\Core;

class Setting
{
    public  static function getSetting()
    {
        return [
            'settings' => [
                'displayErrorDetails' => true,
                'logger' => [
                    'name' => 'slim-app',
                    'path' => __DIR__ . '/../../logs/app.log',
                ],
                'bot' => [
                    'channelToken' => getenv('LINEBOT_CHANNEL_TOKEN') ?: 'DMN0AvauoUylpekM9kuZ8/rLFA8X5u2HbpGNJ6EYVcMiYAhEQ9ew8ynz8KDSkVEcOtWPy8OqUYv2BJjAkKw6B/KD/OJFjz4Vj72oSORkTZYrN59b9jlJ9LTnX1cyjZLlifTfZ45C+fOHIQrL9HFdjwdB04t89/1O/w1cDnyilFU=',
                    'channelSecret' => getenv('LINEBOT_CHANNEL_SECRET') ?: '38c1e8741e77c4e57696011dc2599392',
                ],
                'apiEndpointBase' => getenv('LINEBOT_API_ENDPOINT_BASE'),
            ]
        ];
    }
}