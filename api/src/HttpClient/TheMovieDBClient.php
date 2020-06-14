<?php


namespace App\HttpClient;


use App\DataTransformer\MovieInputDataTransformer;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class TheMovieDBClient implements TheMovieDBClientInterface
{
    /**
     * @var HttpClientInterface
     */
    private $client;

    private $apiKey;

    public function __construct(
        HttpClientInterface $httpClient,
        string $apiKey)
    {
        $this->client = $httpClient;
        $this->apiKey = $apiKey;
    }

    public function getMovie(string $movieId): string
    {
        $response = $this->client->request('GET', $this->getUri($this::GET_MOVIE, ['movieId' => $movieId, 'apiKey' => $this->apiKey]));

        if ($response->getStatusCode() != 200) {
            throw new \Exception('Error when fetcing movie : '.$response->getStatusCode().' error message : '.$response->getContent());
        }

        return $response->getContent();
    }

    private function getUri(string $uri, array $routeParameters = []): string
    {
        $values = array_values($routeParameters);
        $keys = array_map(function ($key) {
            return '{'.$key.'}';
        }, array_keys($routeParameters));

        return str_replace($keys, $values, $uri);
    }
}
