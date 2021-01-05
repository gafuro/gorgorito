<ul>
    <li>
        <a href="{{ route('home') }}" class="font-bold text-lg mb-4 block">
            Home
        </a>
    </li>
    <li>
        <a href="{{ auth()->user()->path() }}" class="font-bold text-lg mb-4 block">
            Profile
        </a>
    </li>
    <li>
        <a href="{{ route('explore') }}" class="font-bold text-lg mb-4 block">
            Explore
        </a>
    </li>
    <li>
        <a href="/" class="font-bold text-lg mb-4 block">
            Welcome
        </a>
    </li>
{{--    <li>--}}
{{--        <form action="/logout" method="POST">--}}
{{--            @csrf--}}
{{--            <button class="font-bold text-lg" type="submit">Logout</button>--}}
{{--        </form>--}}
{{--    </li>--}}
</ul>
