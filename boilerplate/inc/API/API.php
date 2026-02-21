<?php

namespace RS\API;

use RS\Core\Rest;
use WP_REST_Server;

class API extends Rest
{
    protected function routes()
    {
        register_rest_route(
            'example/v1',
            '/ping',
            [
                'methods'             => WP_REST_Server::READABLE | WP_REST_Server::CREATABLE,
                'callback'            => [$this, 'ping'],
                'permission_callback' => [$this, 'permission'],
            ]
        );
    }

    // MUST be public (WordPress calls this)
    public function permission($request)
    {
        $key = $request->get_header('X-RS-KEY');

        if (! is_user_logged_in()) {
            return new \WP_Error(
                'rest_forbidden',
                'You must be logged in.',
                ['status' => 401]
            );
        }

        if ($key !== 'give key') {
            return new \WP_Error(
                'rest_forbidden',
                'Invalid key.',
                ['status' => 403]
            );
        }

        return true;
    }

    public function ping($request)
    {
        return [
            'status' => 'ok',
            'method' => $request->get_method(),
        ];
    }
}

