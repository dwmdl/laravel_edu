<?php

namespace App\Console\Commands;

use App\Http\Filters\v2\Worker\AgeFrom;
use App\Http\Filters\v2\Worker\AgeTo;
use App\Http\Filters\v2\Worker\Name;
use App\Models\Worker;
use Illuminate\Console\Command;
use Illuminate\Pipeline\Pipeline;

class DevCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'develop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is for real cool developers';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        request()->merge([
            'age_from' => '30',
            'age_to' => '35',
        ]);

        $workers = app()->make(Pipeline::class)
            ->send(Worker::query())
            ->through([
                AgeFrom::class,
                AgeTo::class,
                Name::class,
            ])
            ->thenReturn();

        dd($workers->get());
    }
}
