<?php


namespace App\HttpClient;


interface TheMovieDBClientInterface
{
    const GET_MOVIE = "https://api.themoviedb.org/3/movie/{movieId}?api_key={apiKey}";

    public function getMovie(string $movieId): string;
}
