           <div class=" border border-blue-200 rounded-xl shadow-md px-8 py-6 mb-8">
                <form action="/tweets" method="POST">
                    @csrf
                    <textarea name="tweet" class="w-full" placeholder="What's up doc?"></textarea>
                    <hr class="my-4">
                    <footer class="flex justify-between">
                        <a href="{{route('profile',current_user())}}">
                        <img src="{{current_user()->avater}}" alt="avatar" class=" h-10 w-10 rounded-full">
                    </a>
                        <button type="submit" class=" bg-blue-400 rounded-lg px-2 py-2 font-bold text-white border-b shadow">Tweet-a-roo!</button>
                    </footer>
                    @error('tweet')
                        <p class=" text-red-400 font-sans font-bold my-4">{{$message}}</p>
                    @enderror
                </form>
            </div>
