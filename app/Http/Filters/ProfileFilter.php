<?php

namespace App\Http\Filters;

class ProfileFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'first_name',
        'father_name',
        'selected_id',
        'status',
    ];

    /**
     * Filter the query by a given first name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function first_name($value)
    {
        if ($value) {
            return $this->builder->where('first_name', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query by status.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function status($value)
    {
        if ($value) {
            if($value == 'incomplete') {
                return $this->builder->where('status', 0);
            }else {
                return $this->builder->where('status', 1);
            }
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given last name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function last_name($value)
    {
        if ($value) {
            return $this->builder->where('last_name', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Sorting results by the given id.
     *
     * @param $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function selectedId($value)
    {
        if ($value) {
            $this->builder->sortingByIds($value);
        }

        return $this->builder;
    }
}
