<?php

namespace App\Http\Filters\v2\Worker;

use Illuminate\Database\Eloquent\Builder;

class Name
{
    public function handle(Builder $builder, \Closure $next)
    {
        if (request('name')) {
            $builder->where('name', request('name'));
        }

        return $next($builder);
    }
}
