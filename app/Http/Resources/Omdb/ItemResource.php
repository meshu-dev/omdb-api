<?php

namespace App\Http\Resources\Omdb;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $data = $this->resource;

        return [
            'title'       => $data['Title'],
            'year'        => $data['Year'],
            'image'       => $data['Poster'],
            'rating'      => $data['Rated'],
            'releaseDate' => $data['Released'],
            'runtime'     => $data['Runtime'],
            'genre'       => $data['Genre']
        ];
    }
}
