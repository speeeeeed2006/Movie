<?php


namespace App\Entity;


use ApiPlatform\Core\Annotation\ApiResource;
use App\DTO\MovieInput;
use App\DTO\MovieOutput;


class Movie
{
    /*
     * @var string
     */
    public $imdbId;

    /*
     * @var string
     */
    public $title;

    /*
     * @var string
     */
    public $posterPath;

    /*
     * @var int
     */
    public $releaseYear;

    /*
     * @var float
     */
    public $ratingValue;

    /*
     * @var float
     */
    public $ratingCount;
}
