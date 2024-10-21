@extends('layout.main')
@section('content')
    <div>
        <hr>

        @can('create', \App\Models\Worker::class)
            <div>
                <a href="{{route('workers.create')}}">
                    <button type="submit">
                        Add any worker
                    </button>
                </a>
            </div>
            <hr>
        @endcan

        <div>
            <form action="{{route('workers.index')}}" method="get">
                <input type="text" name="name" placeholder="name" value="{{request()->get('name')}}">
                <input type="text" name="surname" placeholder="surname" value="{{request()->get('surname')}}">
                <input type="text" name="email" placeholder="email" value="{{request()->get('email')}}">
                <input type="number" name="from" placeholder="from" value="{{request()->get('from')}}">
                <input type="number" name="to" placeholder="to" value="{{request()->get('to')}}">
                <input type="text" name="description" placeholder="description"
                       value="{{request()->get('description')}}">
                <input id="isMarried" type="checkbox" name="is_married" {{request()->get('is_married') == 'on' ?
            'checked' : ''}}>
                <label for="isMarried">Is It married?</label>

                <button type="submit">Search</button>
                <a href="{{route('workers.index')}}">Reset filter</a>
            </form>
        </div>
        <hr>
        @foreach($workers as $worker)
            <div>
                <div>Name: {{$worker->name}}</div>
                <div>Surname: {{$worker->surname}}</div>
                <div>Email: {{$worker->email}}</div>
                <div>Age: {{$worker->age}}</div>
                <div>Description: {{$worker->description}}</div>
                <div>Is married?: {{$worker->is_married}}</div>
                <a href="{{route('workers.show', $worker->id)}} ">
                    <button type="submit">Show the worker</button>
                </a>
                @can("update", $worker)
                    <a href="{{route('workers.edit', $worker->id)}}">
                        <button type="submit">Edit the worker</button>
                    </a>
                @endcan
            </div>
            @can('delete', $worker)
                <div>
                    <form action="{{route('workers.destroy', $worker->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete the worker</button>
                    </form>
                </div>
            @endcan
            <hr>
        @endforeach
        <div class="my-nav">{{$workers->withQueryString()->links()}}</div>
    </div>
@endsection
