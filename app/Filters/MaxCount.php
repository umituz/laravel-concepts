<?php

namespace App\Filters;

/**
 * Class MaxCount
 * @package App\Filters
 */
class MaxCount extends Filter
{
    /**
     * @param $builder
     * @return mixed
     */
    protected function applyFilter($builder)
    {
        return $builder->take(request($this->filterName()));
    }
}
