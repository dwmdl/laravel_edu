<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Worker\StoreRequest;
use App\Http\Requests\Worker\UpdateRequest;
use App\Http\Resources\WorkerResource;
use App\Models\Worker;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class WorkerController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $workers = Worker::all();
        return WorkerResource::collection($workers);
    }

    public function show(Worker $worker): WorkerResource
    {
        return WorkerResource::make($worker);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $worker = Worker::create($data);
        return WorkerResource::make($worker);
    }

    public function update(Worker $worker, UpdateRequest $request)
    {
        $data = $request->validated();
        $worker->update($data);
        $worker->fresh();
        return WorkerResource::make($worker);
    }

    public function destroy(Worker $worker)
    {
        $worker->forceDelete();
        return response()->json([
           'message' => 'worker was deleted'
        ]);
    }
}
