<?php

namespace App\Filters;

use Closure;
use Illuminate\Support\Str;

/**
 * Class Filter
 * @package App\Filters
 */
abstract class Filter
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $builder = $next($request);

        if (!request()->has($this->filterName())) {

            return $builder;

        }

        return $this->applyFilter($builder);

    }

    /**
     * @param $builder
     * @return mixed
     */
    protected abstract function applyFilter($builder);

    /**
     * @return string
     */
    protected function filterName()
    {
        return Str::snake(class_basename($this));
    }
}
