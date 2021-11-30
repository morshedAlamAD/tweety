<div class="w-full bg-gray-100 p-7 rounded-2xl shadow-sm">
        <h2 class=" text-lg font-bold mb-4">Friends</h2>
        <ul>
            @forelse(auth()->user()->follows as $user)
        <a href="/profile/{{$user->username}}">
          <li class=" list-none py-1">
                <div class="flex items-center text-sm font-bold">
                    <img src="{{$user->avater}}" class="rounded-full mr-4 w-10 h-10" alt="profile avatar">
                {{$user->name}}
                </div></a>
            </li>
            @empty
            <p>No friends to show.</p>
            @endforelse

        </ul>
    </div>
