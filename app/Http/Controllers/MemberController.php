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
        return PaginatorCollection::collection(
            MemberResource::class, 
            $this->search(Member::class, $request, ['name', 'rank', 'joined'])
        );
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
