<footer class="flex">
    <div class="flex items-center mr-1 {{ $tweet->isLikedBy(null, true) ? "text-blue-400" : "text-gray-400" }}">
        <form action="{{route('like',$tweet)}}" method="post" id="tweet-{{ $tweet->id }}-like">
            <input type="hidden" value="1" name="like">
            @csrf
        </form>
        <i
            onclick="document.getElementById('tweet-{{ $tweet->id }}-like').submit()"
            class="fa fa-thumbs-up mr-1 w-3"></i>
        <span class="text-xs text-gray-500">
                    {{ $tweet->likes ?: 0 }}
                </span>
    </div>
    <div class="flex items-center {{ $tweet->isLikedBy(null, false) ? "text-blue-400" : "text-gray-400" }}">
        <form action="{{route('like',$tweet)}}" method="post" id="tweet-{{ $tweet->id }}-dislike">
            <input type="hidden" value="0" name="like">
            @csrf
        </form>
        <i
            onclick="document.getElementById('tweet-{{ $tweet->id }}-dislike').submit()"
            class="fa fa-thumbs-down mr-1 w-3"></i>
        <span class="text-xs text-gray-500">
                    {{ $tweet->dislikes ?: 0 }}
                </span>
    </div>
</footer>
