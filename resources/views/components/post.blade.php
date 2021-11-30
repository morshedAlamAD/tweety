
    <div class="flex p-4 border-b border-gray-200">

        <div class="flex-shrink-0 mr-3">
            <a href="{{route('profile', $data->user->username)}}">
                <img src="{{$data->user->avater}}" alt="avatar" class="object-cover w-10 h-10 mr-2 rounded-full ">
            </a>
        </div>
        <div>
            <a href="{{route('profile', $data->user->username)}}">
                <h5 class="font-bold ">{{$data->user->name}}</h5>
                <p class="mb-4 text-xs ">{{$data->created_at->diffForHumans()}}</p>
            </a>
            <p class="text-sm " >{{$data->tweet}}</p>
            <div class="flex items-center ">
            <div class="flex items-center mt-4 mr-2">

                          <form action="/liked/{{$data->id}}" method="POST">
                    @csrf
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-3 text-gray-400 fill-current ">
                        <path d="M11 0h1v3l3 7v8a2 2 0 0 1-2 2H5c-1.1 0-2.31-.84-2.7-1.88L0 12v-2a2 2 0 0 1 2-2h7V2a2 2 0 0 1 2-2zm6 10h3v10h-3V10z"/>
                        </svg>
                    </button>
            </form>
                <span class="mx-1 text-xs ">{{$data->likeings}}</span>
            </div>
            <div class="flex items-center mt-4">
            <form action="/disliked/{{$data->id}}" method="POST">
                    @csrf
                    <button>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-3 text-gray-400 fill-current ">
                    <path d="M11 20a2 2 0 0 1-2-2v-6H2a2 2 0 0 1-2-2V8l2.3-6.12A3.11 3.11 0 0 1 5 0h8a2 2 0 0 1 2 2v8l-3 7v3h-1zm6-10V0h3v10h-3z"/>
                    </svg>
                </button>
            </form>
                <span class="mx-1 text-xs ">{{$data->dislikeings}}</span>
            </div>
        </div>
        </div>

    </div>
