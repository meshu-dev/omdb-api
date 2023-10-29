<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\Omdb\ApiService;
use App\Http\Resources\Omdb\{SearchResource, ItemResource};

class OmdbController extends Controller
{
    public function __construct(protected ApiService $apiService) { }

    public function search(Request $request)
    {
        $validationErrors = $this->validateParams(
            ['term' => $request->term],
            ['term' => 'required|string|max:250']
        );

        if ($validationErrors) {
            return response()->json($validationErrors, 422);
        }

        $results = $this->apiService->search($request->term);

        return SearchResource::collection($results);
    }

    public function getItem(Request $request)
    {
        $validationErrors = $this->validateParams(
            ['id' => $request->id],
            ['id' => 'required|string|max:10']
        );

        if ($validationErrors) {
            return response()->json($validationErrors, 422);
        }

        $result = $this->apiService->getById($request->id);

        return new ItemResource($result);
    }

    protected function validateParams(array $params, array $rules)
    {
        $validator = Validator::make(
            $params,
            $rules
        );

        $messageBag = $validator->errors();

        return $messageBag->isEmpty() ? null : $messageBag;
    }
}
