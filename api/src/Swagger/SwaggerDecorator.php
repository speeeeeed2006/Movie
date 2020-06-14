<?php


namespace App\Swagger;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class SwaggerDecorator implements NormalizerInterface
{
    private $decorated;

    public function __construct(NormalizerInterface $decorated)
    {
        $this->decorated = $decorated;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $docs = $this->decorated->normalize($object, $format, $context);

        $customDefinition = [
            'name' => 'movieId',
            'description' => 'Movie Id',
            'default' => 550,
            'in' => 'query',
            'responses' => [
                '200' => [
                    "description" => "Movie resource response",
                    "content" => [
                    "application/json" => [
                        "type" => "array",
                    ]
                  ]
                ],
                '400' => [
                    "description" => "Resource not found"
                ]
            ]
        ];

        // e.g. add a custom parameter
        $docs['paths']['/movie']['get']['parameters'][] = $customDefinition;

        return $docs;
    }

    public function supportsNormalization($data, string $format = null)
    {
        return $this->decorated->supportsNormalization($data, $format);
    }
}
