<?php


namespace App\Controller;


use App\DataProvider\MovieDataProvider;
use App\Entity\Movie;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/movie", name="api_")
 */
class MovieController
{
    private $movieDataProvider;

    public function __construct(MovieDataProvider $movieDataProvider)
    {
        $this->movieDataProvider = $movieDataProvider;
    }

    /**
     * @Route(
     *     path="/",
     *     name="api",
     *     methods={"GET"},
     *     defaults={
     *      "_controller"="\App\Controller\MovieController::getMovieById",
     *      "_api_item_operation_name"="getMovie",
     *      "_api_receive"=true
     *     }
     * )
     *
     * @param string $movieId
     */
    public function getMovieById(Request $request)
    {
        $movieInfo = $this->movieDataProvider->getItem(Movie::class, $request->query->get('movieId'));

        $response = new JsonResponse($movieInfo);
        $response->setEncodingOptions(JSON_UNESCAPED_SLASHES);

        return $response;
    }
}
