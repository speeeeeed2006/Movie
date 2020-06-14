<?php


namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\SerializerAwareDataProviderInterface;
use ApiPlatform\Core\DataProvider\SerializerAwareDataProviderTrait;
use App\DataTransformer\MovieInputDataTransformer;
use App\DTO\MovieInput;
use App\HttpClient\TheMovieDBClient;
use App\Entity\Movie;

/**
 * @ApiResource
 */
final class MovieDataProvider implements ItemDataProviderInterface, SerializerAwareDataProviderInterface
{
    use SerializerAwareDataProviderTrait;

    private $client;

    private $movieInputDataTransformer;

    public function __construct(
        TheMovieDBClient $client,
        MovieInputDataTransformer $movieInputDataTransformer
    ) {
        $this->client = $client;
        $this->movieInputDataTransformer = $movieInputDataTransformer;
    }
    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return Movie::class === $resourceClass;
    }

    public function getItem(string $resourceClass, $id, string $operationName = null, array $context = [])
    {
        // Retrieve data from anywhere you want, in a custom format
        try {
            $data = $this->client->getMovie($id);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        $movieInput = $this->getSerializer()->deserialize($data, MovieInput::class, 'json');

        $movie = $this->movieInputDataTransformer->transform($movieInput, Movie::class);

        // Deserialize data using the Serializer
        return $movie;
    }
}
