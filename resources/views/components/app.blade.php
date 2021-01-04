<x-master>
    <section class="px-8">
        <main class="container mx-auto">
            <div class="lg:flex lg:justify-between">
                @if (auth()->check())
                    <div class="lg:w-32">
                        @include('partials._sidebar-links')
                    </div>
                @endif

                <div class="lg:flex-1 lg:mx-10" style="max-width: 700px;">
                    <div class="lg:flex-1 lg:mx-10">
                        {{  $slot }}
                    </div>
                </div>

                @if (auth()->check())
                    <div class="lg:w-1/6 bg-gray-200 border-gray-300 rounded-lg p-4">
                        @include('partials._friends-list')
                    </div>
                @endif
            </div>
        </main>
    </section>
</x-master>
