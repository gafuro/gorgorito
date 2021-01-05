<x-app>
    <h1>Show notifications</h1>
    <ul>
        @foreach($notifications as $notification)
            <li>{{ $notification->data['message'] }}</li>
        @endforeach
    </ul>
</x-app>
