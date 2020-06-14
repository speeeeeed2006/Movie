<?php


namespace App\DTO;


class MovieInput
{
    /**
     * @var string
     */
    public $imdb_id;

    /*
     * @var string
     */
    public $title;

    /*
     * @var string
     */
    public $poster_path;

    /*
     * @var string
     */
    public $release_date;

    /*
     * @var float
     */
    public $vote_average;

    /*
     * @var float
     */
    public $vote_count;
}
