<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class OrderBy
 * @package App\Scopes
 */
class OrderBy implements Scope
{
	/**
	 * Generates query
	 *
	 * @param Builder $builder
	 * @param Model $model
	 */
	public function apply(Builder $builder, Model $model)
	{
		$builder->orderByDesc('id');
	}
}
