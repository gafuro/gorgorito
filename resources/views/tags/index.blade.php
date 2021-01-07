<x-app>
    <div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
        <form action="{{route('new_tag')}}" method="POST">
            @csrf
            @method('POST')
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" class="w-full border border-blue-100" required>
            </div>
            <label for="code">Code</label>
            <input type="text" name="code" class="w-full border border-blue-100">
            <textarea
                name="body"
                class="w-full"
                placeholder="Description"
            ></textarea>

            <hr class="my-4" />
            <footer class="flex justify-between items-center">
                <button type="submit"
                        class="bg-blue-500 rounded rounded-lg shadow py-2 px-10 text-white hover:bg-blue-600 text-sm">
                    Save tag
                </button>
            </footer>
        </form>

        <div>
            @error('body')
            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div>
        <h3>Trendy tags</h3>
        @forelse($tags as $tag)
            <div class="my-3">
                <form action="{{route('toggle_follow_tag',$tag)}}" method="POST">
                    @csrf
                    <button class="text-sm font-medium bg-red-100 py-1 px-2 rounded text-green-500 align-middle hover:text-red-500">
                        {{$tag->name}}
                    </button>
                    @if ($tag->isFollowedBy(auth()->user()))
                        Following this trend
                    @endif
                </form>
            </div>
        @empty
            <p>No tag to show</p>
        @endforelse
    </div>
</x-app>
