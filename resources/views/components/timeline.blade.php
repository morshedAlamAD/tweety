<div class=" border border-gray-300 rounded-lg">
    @forelse ( $tweets as $data )
        @include('components.post')
    @empty
        <p class="px-4 py-2 text-lg m-auto w-44">No tweets yet.</p>
    @endforelse
{{$tweets->links()}}


</div>
