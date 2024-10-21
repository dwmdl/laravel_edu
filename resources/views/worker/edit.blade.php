@extends('layout.main')
@section('content')
<div>
    <hr>
    <div>
        <form action="{{route('workers.update', $worker->id)}}" method="post">
            @csrf
            @method('PATCH')
            <div style="margin-bottom: 15px">
                <input type="text" name="name" placeholder="Name" value="{{old('name') ?? $worker->name}}">
                @error('name')
                {{ $message }}
                @enderror
            </div>
            <div style="margin-bottom: 15px">
                <input type="text" name="surname" placeholder="Surname" value="{{old('surname') ?? $worker->surname}}">
                @error('surname')
                {{ $message }}
                @enderror
            </div>
            <div style="margin-bottom: 15px">
                <input type="email" name="email" placeholder="EMail" value="{{old('email') ?? $worker->email}}">
                @error('email')
                {{ $message }}
                @enderror
            </div>
            <div style="margin-bottom: 15px">
                <input type="number" name="age" placeholder="Age" value="{{old('age') ?? $worker->age}}">
            </div>
            <div style="margin-bottom: 15px">
                <textarea name="description" placeholder="Description">
                    {{old('description') ?? $worker->description}}
                </textarea>
            </div>
            <div style="margin-bottom: 15px">
                <input id="isMarried" type="checkbox" name="is_married" {{$worker->is_married ? ' checked' : ''}}>
                <label for="isMarried">Is it married?</label>
            </div>
            <div style="margin-bottom: 15px">
                <button type="submit">Save change</button>
            </div>
        </form>
    </div>
    <hr>
</div>
@endsection
