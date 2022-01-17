<?php

/**
 * return void
 */
function route_callback()
{}


add_action('rest_api_init', function () {
    register_rest_route('app/v1', 'route_name', [
        'methods' => 'GET',
        'callback' => 'route_callback',
    ]);
});