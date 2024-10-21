<?php

namespace App\Http\Filters\v1;

use Illuminate\Database\Eloquent\Builder;

class WorkerFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const SURNAME = 'surname';
    public const EMAIL = 'email';
    public const AGE_FROM = 'from';
    public const AGE_TO = 'to';
    public const DESCRIPTION = 'description';
    public const IS_MARRIED = 'is_married';

    public function getCallbacks(): array
    {
        return [
            self::NAME => 'name',
            self::SURNAME => 'surname',
            self::EMAIL => 'email',
            self::AGE_FROM => 'ageFrom',
            self::AGE_TO => 'ageTo',
            self::DESCRIPTION => 'description',
            self::IS_MARRIED => 'isMarried',
        ];
    }

    public function name(Builder $builder, $value): void
    {
        $builder->where('name', 'like', "%$value%");
    }

    public function surname(Builder $builder, $value): void
    {
        $builder->where('surname', 'like', "%$value%");
    }

    public function email(Builder $builder, $value): void
    {
        $builder->where('email', 'like', "%$value%");
    }

    public function ageFrom(Builder $builder, $value): void
    {
        $builder->where('age', '>', $value);
    }

    public function ageTo(Builder $builder, $value): void
    {
        $builder->where('age', '<', $value);
    }

    public function description(Builder $builder, $value): void
    {
        $builder->where('description', 'like', "%$value%");
    }

    public function isMarried(Builder $builder, $value): void
    {
        $builder->where('is_married', true);
    }


}
