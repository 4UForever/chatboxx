<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Facebook Token
    |--------------------------------------------------------------------------
    |
    | Your Facebook application you received after creating
    | the messenger page / application on Facebook.
    |
    */
    'token' => env('FACEBOOK_TOKEN'),

    /*
    |--------------------------------------------------------------------------
    | Facebook App Secret
    |--------------------------------------------------------------------------
    |
    | Your Facebook application secret, which is used to verify
    | incoming requests from Facebook.
    |
    */
    'app_secret' => env('FACEBOOK_APP_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | Facebook Verification
    |--------------------------------------------------------------------------
    |
    | Your Facebook verification token, used to validate the webhooks.
    |
    */
    'verification' => env('FACEBOOK_VERIFICATION'),

    /*
    |--------------------------------------------------------------------------
    | Facebook Start Button Payload
    |--------------------------------------------------------------------------
    |
    | The payload which is sent when the Get Started Button is clicked.
    |
    */
    'start_button_payload' => 'Welcome to sawanshop chatbot, Please choose message type from the menu :)',

    /*
    |--------------------------------------------------------------------------
    | Facebook Greeting Text
    |--------------------------------------------------------------------------
    |
    | Your Facebook Greeting Text which will be shown on your message start screen.
    |
    */
    'greeting_text' => [
        'greeting' => [
            [
                'locale' => 'default',
                'text' => 'Hello!',
            ],
            [
                'locale' => 'en_US',
                'text' => 'Timeless apparel for the masses.',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Facebook Persistent Menu
    |--------------------------------------------------------------------------
    |
    | Example items for your persistent Facebook menu.
    |
    */
    'persistent_menu' => [
        [
            'locale' => 'default',
            'composer_input_disabled' => 'true',
            'call_to_actions' => [
                [
                    'title' => 'Template to test',
                    'type' => 'nested',
                    'call_to_actions' => [
                        [
                            'title' => 'Quick Replies',
                            'type' => 'postback',
                            'payload' => 'QUICK_PAYLOAD',
                        ],
                        [
                            'title' => 'List Template',
                            'type' => 'postback',
                            'payload' => 'LIST_PAYLOAD',
                        ],
                        [
                            'title' => 'Generic Template',
                            'type' => 'postback',
                            'payload' => 'GENERIC_PAYLOAD',
                        ],
                        [
                            'title' => 'Media',
                            'type' => 'postback',
                            'payload' => 'MEDIA_PAYLOAD',
                        ],
                        /*[
                            'title' => 'Pay Bill',
                            'type' => 'postback',
                            'payload' => 'PAYBILL_PAYLOAD',
                        ],*/
                    ],
                ],
                /*[
                    'type' => 'web_url',
                    'title' => 'Latest News',
                    'url' => 'http://botman.io',
                    'webview_height_ratio' => 'full',
                ],*/
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Facebook Domain Whitelist
    |--------------------------------------------------------------------------
    |
    | In order to use domains you need to whitelist them
    |
    */
    'whitelisted_domains' => [
        'https://petersfancyapparel.com',
    ],
];
