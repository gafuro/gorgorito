<x-app>
    <div>
        @forelse($users as $user)
            <div class="flex items-center mb-5">
                <a href="{{$user->path()}}">
                    <img src="{{$user->avatar}}"
                         width="60px"
                         alt="{{$user->name}}'s picture"
                         class="mr-4 rounded"
                    />
                    <div>
                        <h4 class="font-bold">
                            {{ $user->name }}
                        </h4>
                    </div>
                    </a>
            </div>
        @empty
            <p>This is Odd, we don't find any body...</p>
        @endforelse

        {{ $user->links }}
    </div>
</x-app>
