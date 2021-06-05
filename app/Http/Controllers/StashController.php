<?php

namespace App\Http\Controllers;

use App\Http\Requests\DatatableRequest;
use App\Http\Resources\PaginatorCollection;
use App\Http\Resources\StashResource;
use App\Models\HistoryItem;
use App\Models\StashLog;
use App\Traits\UsesDatatable;

class StashController extends Controller
{
    use UsesDatatable;

    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Requests\DatatableRequest
     * @return \Illuminate\Http\Response
     */
    public function index(DatatableRequest $request)
    {
        // TODO: Figure out a way to search stash by both history_item and item relations data.
        // Might have to create a separate table for these...

        // This one works faster, but has no access to item name.
        /** @var \Illuminate\Database\Eloquent\Builder $query */
        $query = HistoryItem::with(['metable', 'metable.item']);
        $query = $this->search($query, $request, ['log_user']);
        $query->where('metable_type', StashLog::class);
        $data = $this->paginate($query, $request);

        // This one worked too slow!
        // $query = StashLog::with(['history_item', 'item']);
        // $query = $this->search($query, $request, ['operation']);
        // $query = $this->searchByRelation($query, 'history_item', 'log_user', $request);
        // $data = $this->paginate($query, $request);

        $results = new PaginatorCollection(StashResource::class, $data);
        return response()->json($results);
    }

    /**
     * Display the specified resource.
     *
     * @param   StashLog    $item
     * @return  \Illuminate\Http\Response
     */
    public function show(StashLog $item)
    {
        return response()->json($item);
    }
}
