<?php


namespace App\DataTransformer;

use App\DTO\MovieInput;
use App\Entity\Movie;

class MovieInputDataTransformer
{
    private $posterHost;

    public function __construct(string $posterHost)
    {
        $this->posterHost = $posterHost;
    }

    public function transform($data, string $to)
    {
        if (!($data instanceof MovieInput)) {
            throw new \Exception('Error when transforming movie : $data provided not instance of MovieInput class');
        }

        $movie = new Movie();
        $movie->imdbId = $data->imdb_id;
        $movie->title = $data->title;
        $movie->posterPath = $this->posterHost.$data->poster_path;
        $movie->releaseYear = \DateTime::createFromFormat("Y-m-d", $data->release_date)->format("Y");
        $movie->ratingValue = $data->vote_average;
        $movie->ratingCount = $data->vote_count;
        return $movie;
    }
}
