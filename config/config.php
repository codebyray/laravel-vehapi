<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    /**
     * Vehicle Information API token.
     * You should add VEH_API_TOKEN to your .env file with your token. Your .env file should
     * be secured and not accessible via the web. Alternately you can input your token below.
     */
    'veh_api_token' => env('VEH_API_TOKEN', null),

    /**
     * Changing versions is easy, just change the version number below to switch between versions.
     */
    'veh_api_version' => env('VEH_API_VERSION', 'v1'),
];
