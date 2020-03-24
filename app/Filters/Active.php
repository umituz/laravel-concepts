<?php

namespace App\Filters;

/**
 * Class Active
 * @package App\Filters
 */
class Active extends Filter
{
    /**
     * @param $builder
     * @return mixed
     */
    protected function applyFilter($builder)
    {
        return $builder->where($this->filterName(), request($this->filterName()));
    }
}
