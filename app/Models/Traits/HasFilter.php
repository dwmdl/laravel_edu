<?php

namespace App\Models\Traits;

use App\Http\Filters\v1\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

trait HasFilter
{
    public function scopeFilter(Builder $builder, FilterInterface $filter): Builder
    {
        $filter->applyFilter($builder);
        return $builder;
    }
}
