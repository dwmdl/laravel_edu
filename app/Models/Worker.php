<?php

namespace App\Models;

use App\Models\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Worker extends Model
{
    use HasFactory;
    use HasFilter;
    use SoftDeletes;

    protected $table = 'workers';
    protected $guarded = false;

    protected static function booted(): void
    {
//        // event checker that check "create" event
//        static::created(static function ($model) {
//            event(new CreatedEvent($model));
//        });
//
//        // event checker that check "update" model
//        static::updated(static function ($model) {
//            if ($model->wasChanged() && $model->getOriginal("age") != $model->getAttributes()["age"]) {
//                dd("Event works correctly");
//            }
//        });
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function avatar()
    {
        return $this->morphOne(Avatar::class, 'avatarable');
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
