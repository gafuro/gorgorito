@extends('components.app')

@section('content')
    <header class="relative">
        <img
            class="mb-2"
            width="700px"
            src="/images/banner/generic_banner.jpg"
            alt="user_banner"
        />
        <div class="flex justify-between items-center mb-4">
            <div>
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>
            <div>
                <a href="#" class="rounded-full border border-gray-300 py-2 px-4 text-black mr-2 text-xs">
                    Edit profile
                </a>
                @if (auth()->user()->id != $user->id)
                    <a href="#" class="bg-blue-500 rounded-lg shadow py-2 px-4 text-white text-xs">
                        Follow me
                    </a>
                @endif
            </div>

        </div>

        <p class="text-sm">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
        </p>

        <img
            src="{{ $user->getAvatarAttr(150) }}"
            alt="Avatar name"
            class="rounded-full mr-2 absolute"
            style="left: calc(50% - 75px); top:70px;"
        />
    </header>
    @include('partials._timeline',[
        'tweets' => $user->tweets
    ])
@endsection
