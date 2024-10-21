<?php

namespace App\Http\Filters\v1;

use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const VIEW = 'view';

    public function getCallbacks(): array
    {
        return [
            self::TITLE => 'title',
            self::VIEW => 'view',
        ];
    }

    public function title(Builder $builder, $value): void
    {
        $builder->where('name', 'like', "%$value%");
    }

    public function view(Builder $builder, $value): void
    {
        $builder->where('surname', 'like', "%$value%");
    }
}
