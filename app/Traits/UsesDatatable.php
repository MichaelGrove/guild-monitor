<?php
namespace App\Traits;

use App\Http\Requests\DatatableRequest;

trait UsesDatatable
{
    /**
     * A simple search for datatables.
     *
     * @param string $model
     * @param DatatableRequest $request
     * @param array $fields
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function search(string $model, DatatableRequest $request, array $fields)
    {
        $search = trim($request->get('search'));
        $page = intval($request->get('page'));
        $page = $page > 0 ? $page : 1;

        /** @var \Illuminate\Database\Eloquent\Builder $query */
        $query = $model::query();
        foreach ($fields as $k => $field) {
            if ($k > 0) {
                $query->orWhere($field, $search);
            }
            else {
                $query->where($field, $search);
            }
        }

        return $query->paginate(24, null, null, $page);
    }
}
?>