<?php

namespace App\Http\Resources\Omdb;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SearchResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $data = $this->resource;

        return [
            'id'    => $data['imdbID'],
            'title' => $data['Title'],
            'year'  => $data['Year'],
            'image' => $data['Poster']
        ];
    }
}
