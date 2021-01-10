<x-app>
    <h1>Show notifications</h1>
    <ul>
        @foreach($notifications as $notification)
            <li><span>{{ $notification->data['message'] }} <small class="text-blue-900">Read {{$notification->read_at->diffForHumans() }} </small></span></li>
        @endforeach
    </ul>
</x-app>
