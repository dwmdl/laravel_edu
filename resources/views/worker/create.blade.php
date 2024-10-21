@extends('layout.main')
@section('content')
    Create page
    <div>
        <hr>
        <div>
            <form action="{{ route('workers.store') }}" method="post">
                @csrf

                <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
                @error('name')
                {{ $message }}
                @enderror

                <div style="margin-bottom: 15px">
                    <input type="text" name="surname" placeholder="Surname" value="{{ old('surname') }}">
                    @error('surname')
                    {{ $message }}
                    @enderror
                </div>
                <div style="margin-bottom: 15px">
                    <input type="email" name="email" placeholder="EMail" value="{{ old('email') }}">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
                <div style="margin-bottom: 15px">
                    <input type="number" name="age" placeholder="Age" value="{{ old('age') }}">
                </div>
                <div style="margin-bottom: 15px">
                    <textarea name="description" placeholder="Description">
                    {{ old('description') }}
                </textarea>
                </div>
                <div style="margin-bottom: 15px">
                    <input id="isMarried" type="checkbox" name="is_married" @checked(old('is_married'))>
                    <label for="isMarried">Is it married?</label>
                </div>
                <div style="margin-bottom: 15px">
                    <button type="submit">Create</button>
                </div>
            </form>
        </div>
        <hr>
    </div>
@endsection
