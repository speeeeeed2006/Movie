<?php


namespace App\HttpClient;


class BaseApi
{
    protected function getUri(string $uri, array $routeParameters = []): string
    {
        $values = array_values($routeParameters);
        $keys = array_map(function ($key) {
            return '{'.$key.'}';
        }, array_keys($routeParameters));

        return str_replace($keys, $values, $uri);
    }
}
