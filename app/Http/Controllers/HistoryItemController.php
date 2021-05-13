<?php

namespace App\Http\Controllers;

use App\Http\Resources\HistoryItemCollection;
use App\Models\HistoryItem;
use Illuminate\Http\Request;

class HistoryItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new HistoryItemCollection(HistoryItem::with('metable')->paginate(24));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HistoryItem  $historyItem
     * @return \Illuminate\Http\Response
     */
    public function show(HistoryItem $historyItem)
    {
        return response()->json($historyItem);
    }
}
