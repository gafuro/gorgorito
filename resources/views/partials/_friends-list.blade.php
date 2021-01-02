<h3 class="font-bold text-xl mb-4">Following</h3>
<ul>
    @foreach(auth()->user()->follows as $user)
        <li class="mb-4">
            <div class="flex items-center text-sm">
                <img
                    src="{{ $user->getAvatarAttr() }}"
                    alt="Avatar name"
                    class="rounded-full mr-2"
                />
                @if ($user->id == auth()->user()->id)
                    By me
                @else
                    {{ $user->name }}
                @endif
            </div>
        </li>
    @endforeach
</ul>
