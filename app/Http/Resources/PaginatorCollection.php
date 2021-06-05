<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class PaginatorCollection extends ResourceCollection
{

    private string $resource_class;

    public function __construct(string $resource_class, LengthAwarePaginator $collection)
    {
        parent::__construct($collection);
        $this->resource_class = $resource_class;
    }

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->resource_class::collection($this->collection),
            'current_page' => $this->currentPage(),
            'last_page' => $this->lastPage(),
            'per_page' => $this->perPage(),
            'total' => $this->total(),
        ];
    }
}
