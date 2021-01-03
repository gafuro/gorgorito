<h3 class="font-bold text-xl mb-4">Following</h3>
<ul>
    @forelse(auth()->user()->follows as $user)
        <li class="mb-4">
            <div>
                <a href="{{ $user->path() }}" class="flex items-center test-sm">
                    <img
                        src="{{ $user->avatar }}"
                        alt="{{$user->name}} name"
                        width="40px;"
                        class="rounded-full mr-2"
                    />
                    @if ($user->id == auth()->user()->id)
                        By me
                    @else
                        {{ $user->name }}
                    @endif
                </a>
            </div>
        </li>
    @empty
        <li>No friends yet, let's get social</li>
    @endforelse
</ul>
