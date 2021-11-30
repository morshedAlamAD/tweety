@extends('layouts.app')
@section('content')
    <div class="w-full bg-gray-100 p-7 rounded-2xl shadow-sm">
        <h2 class=" text-lg font-bold mb-4">Friends</h2>
        <ul>
        @forelse( $users as $user)
             <li @class(['list-none','py-1', 'hidden'=>$user == current_user()])>
                 <a href="{{'/profile/'.$user->username}}">
                <div class="flex items-center text-lg font-bold">
                    <img src="{{$user->avater}}" class="rounded-lg mr-4 object-cover w-16 h-16" alt="profile avatar">
                {{ '@'.$user->username}}
                </div></a>
            </li>
            @empty
            <p>No friends to show.</p>
            @endforelse

        </ul>
    </div>
@endsection
