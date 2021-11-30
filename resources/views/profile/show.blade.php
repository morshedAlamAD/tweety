@extends('layouts.app')

@section('content')
    <header class="mb-6 relative items-center">
        <img src="{{asset('images/cover-photo.jpg')}}" alt="" class="mb-5 w-full h-52 object-cover rounded-3xl">
        <img src="{{$user->avater}}" alt="" class="rounded-full absolute object-cover h-40 w-40" style="top: 100px; left: 40%;">
        <div class=" flex justify-between items-center">
            <div>
                <h2 class="font-bold text-2xl uppercase">{{$user->name}}</h2>
                <p class="text-sm">{{$user->created_at->diffForHumans()}}</p>
            </div>
            <div class="flex">
                    <a href="{{$user->username}}/edit" @class([ 'bg-white', 'rounded-full','border', 'border-gray-300', 'py-2', 'px-3', 'text-sm','hidden'=>!current_user()->is($user) ])>Edit Profile</a>
                @unless (auth()->user()->is($user))
                <form action="/profile/{{$user->username}}/follow" class="mx-1" method="POST">
                    @csrf
                    <button @class(['bg-blue-500', 'rounded-full', 'shadow', 'py-2', 'px-3', 'text-white', 'text-sm'])>{{auth()->user()->following($user)? 'Unfollow me' : 'Follow me'}}</button>
                </form>
                @endunless


            </div>
        </div>
                    <p class="text-center w-2/3 text-sm m-auto">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corrupti provident temporibus sunt possimus. Assumenda a explicabo ab cumque modi earum nihil dolorem debitis, officiis repellendus consequuntur ipsam, asperiores iusto adipisci! lore</p>
    </header>
    @include('components.timeline', ["tweets" => $user->tweets()->cursorPaginate(3) ])
@endsection
