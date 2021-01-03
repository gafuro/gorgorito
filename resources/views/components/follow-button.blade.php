@unless (auth()->user()->is($user))
    @if (auth()->user()->isFollowing($user))
        <form class="" method="post" action="/profiles/{{ $user->id }}/unfollow">
            @csrf
            <button class="bg-blue-500 rounded-lg shadow py-2 px-4 text-white text-xs">
                Unfollow
            </button>
        </form>
    @else
        <form class="" method="post" action="/profiles/{{ $user->id }}/follow">
            @csrf
            <button class="bg-blue-500 rounded-lg shadow py-2 px-4 text-white text-xs">
                Follow me
            </button>
        </form>
    @endif
@endunless
