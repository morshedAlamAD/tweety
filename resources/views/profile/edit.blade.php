@extends('layouts.app')
@section('content')
<form action="/profile/{{auth()->user()->username}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="mb-4">
        <label for="name" class=" block mb-2 uppercase text-gray-700 text-xs font-bold">Name</label>
        <input type="text" name="name" class="border border-gray-500 p-2 w-full" value="{{$user->name}}" required>
       @error('name')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
       @enderror
        </div>
        <div class="mb-4">
            <label for="username" class=" block mb-2 uppercase text-gray-700 text-xs font-bold">username</label>
            <input type="text" name="username" class="border border-gray-500 p-2 w-full" value="{{$user->username}}" required>
           @error('username')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
           @enderror
        </div>
        <div class="mb-4">
            <label for="email" class=" block mb-2 uppercase text-gray-700 text-xs font-bold">email</label>
            <input type="email" name="email" class="border border-gray-500 p-2 w-full" value="{{$user->email}}" required>
           @error('email')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
           @enderror
        </div>

        <div class="mb-4">
            <label for="avater" class=" block mb-2 uppercase text-gray-700 text-xs font-bold">avater</label>
            <input type="file" name="avater" class="border border-gray-500 p-2 w-full">
           @error("avater")
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
           @enderror
        </div>
        <div class="mb-4">
            <label for="password" class=" block mb-2 uppercase text-gray-700 text-xs font-bold">password</label>
            <input type="password" name="password" class="border border-gray-500 p-2 w-full" required>
           @error('password')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
           @enderror
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class=" block mb-2 uppercase text-gray-700 text-xs font-bold">confirm password</label>
            <input type="password" name="password_confirmation" class="border border-gray-500 p-2 w-full">
           @error('password_confirmation')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
           @enderror
        </div>
        <div class="mb-6">
            <button class="bg-blue-400 text-white uppercase rounded py-2 px-4 hover:bg-blue-500">submit</button>
        </div>
</form>
@endsection
