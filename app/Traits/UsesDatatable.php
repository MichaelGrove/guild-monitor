<?php
namespace App\Traits;

use App\Http\Requests\DatatableRequest;
use Illuminate\Database\Eloquent\Builder;

trait UsesDatatable
{
    /**
     * A simple search for datatables. Returns query for further handling.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param DatatableRequest $request
     * @param array $fields
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function search(Builder $query, DatatableRequest $request, array $fields)
    {
        $search = trim($request->get('search'));

        $query->select('*');
        foreach ($fields as $k => $field) {
            if ($k === 0) {
                $query->where($field, 'LIKE', '%' . $search . '%');
            }
            else {
                $query->orWhere($field, 'LIKE', '%' . $search . '%');
            }
        }

        return $query;
    }

    /**
     * Paginates query results
     *
     * @param Builder $query
     * @param DatatableRequest $request
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginate(Builder $query, DatatableRequest $request)
    {
        $page = intval($request->get('page'));
        $page = $page > 0 ? $page : 1;
        return $query->paginate(24, null, null, $page);
    }

    public function searchByRelation(Builder $query, string $relation, string $field, DatatableRequest $request)
    {
        $search = trim($request->get('search'));

        return $query->orWhereHas($relation, function($q) use ($field, $search) {
            return $q->where($field, 'LIKE', '%' . $search . '%');
        });
    }
}
?>