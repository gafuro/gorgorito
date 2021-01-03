<div class="border border-gray-300 rounded-lg">
    @forelse($tweets as $tweet)
        @include('partials._tweet')
    @empty
        <p class="p-4">Nothing to show! What are you thinking?</p>
    @endforelse
</div>
