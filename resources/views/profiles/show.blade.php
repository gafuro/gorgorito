<x-app>
    <header class="relative">
        <div class="relative">
            <img
                class="mb-2"
                width="700px"
                src="/images/banner/generic_banner.jpg"
                alt="user_banner"
            />
            <img
                src="{{ $user->getAvatarAttr(150) }}"
                alt="Avatar name"
                class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                width="150px"
                style="left: 50%;"
            />
        </div>
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>
            <div class="flex">
                @can('edit',$user)
                <a href="{{ $user->path('edit_profile') }}" class="rounded-full border border-gray-300 py-2 px-4 text-black mr-2 text-xs">
                    Edit profile
                </a>
                @endcan
                <x-follow-button :user="$user" />
            </div>

        </div>

        <p class="text-sm">
            {{ $user->description }}
        </p>

    </header>
</x-app>
