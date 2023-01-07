<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\OmdbService;

class ApiController extends AbstractController
{
    protected $omdbService;

    public function __construct(OmdbService $omdbService)
    {
        $this->omdbService = $omdbService;
    }

    #[Route('/search/{title}', name: 'search', methods: ['GET'])]
    public function search(string $title): JsonResponse
    {
        $results = $this->omdbService->search($title);

        return $this->json(['data' => $results]);
    }

    #[Route('/id/{id}', name: 'getById', methods: ['GET'])]
    public function getById(string $id): JsonResponse
    {
        $result = $this->omdbService->getById($id);

        return $this->json(['data' => $result]);
    }

    #[Route('/title/{title}', name: 'getByTitle', methods: ['GET'])]
    public function getByTitle(string $id): JsonResponse
    {
        // TODO
        //$result = $this->omdbService->getByTitle($title);

        return $this->json(['data' => $result]);
    }
}
