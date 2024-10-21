<?php

namespace App\Http\Controllers;

use App\Http\Filters\v2\Worker\AgeFrom;
use App\Http\Filters\v2\Worker\AgeTo;
use App\Http\Filters\v2\Worker\Name;
use App\Http\Requests\Worker\FilterRequest;
use App\Http\Requests\Worker\StoreRequest;
use App\Http\Requests\Worker\UpdateRequest;
use App\Models\Worker;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Gate;

class WorkerController extends Controller
{
    public function index(FilterRequest $request)
    {
        $data = $request->validated();

        $workers = app()->make(Pipeline::class)
            ->send(Worker::query())
            ->through([
                AgeFrom::class,
                AgeTo::class,
                Name::class,
            ])
            ->thenReturn();

        $workers = $workers->paginate(4);

        return view('worker.index', compact('workers'));
    }

    public function show(Worker $worker)
    {
        return view('worker.show', compact('worker'));
    }

    public function create()
    {
        Gate::authorize('create', Worker::class);

        return view('worker.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        Gate::authorize('create', Worker::class);

        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);
        Worker::create($data);

        return redirect()->route('workers.index');
    }

    public function edit(Worker $worker)
    {
        Gate::authorize('update', $worker);

        return view('worker.edit', compact('worker'));
    }

    public function update(UpdateRequest $request, Worker $worker): RedirectResponse
    {
        Gate::authorize('update', $worker);

        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);
        $worker->update($data);

        return redirect()->route('workers.show', $worker->id);
    }

    public function destroy(Worker $worker)
    {
        Gate::authorize('delete', $worker);

        $worker->delete();

        return redirect()->route('workers.index');
    }
}
