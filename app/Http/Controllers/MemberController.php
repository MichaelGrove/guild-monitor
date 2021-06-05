<?php

namespace App\Http\Controllers;

use App\Http\Requests\DatatableRequest;
use App\Http\Resources\MemberResource;
use App\Http\Resources\PaginatorCollection;
use App\Models\Member;
use App\Traits\UsesDatatable;

class MemberController extends Controller
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
        $query = $this->search(Member::query(), $request, ['name', 'rank']);
        $data = $this->paginate($query, $request);
        $results = new PaginatorCollection(MemberResource::class, $data);
        return response()->json($results);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return response()->json($member);
    }
}
