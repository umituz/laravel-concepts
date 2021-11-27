@extends('layouts.app')

@section('content')
    <div class="w-2/3 bg-gray-200 mx-auto p-6 shadow">
        <form autocomplete="off" action="/authors" method="post" class="flex flex-col items-center">
            @csrf
            <h1>Add New Author</h1>
            <div>
                <input type="text" class="rounded py-2 px-4 w-64" name="name" placeholder="Full Name">
                @error('name')
                <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="pt-4">
                <input type="text" class="rounded py-2 px-4 w-64" name="birthday" placeholder="Birthday">
                @error('birthday')
                <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="pt-4">
                <button class="bg-blue-400 text-white rounded py-2 px-4">Add New Author</button>
            </div>
        </form>
    </div>
@endsection
