<div class="container">
    <h1>Channel Statistics</h1>
    @if(isset($channelStats))
        @foreach($channelStats->getItems() as $item)
            <p>Channel: {{ $item['snippet']['title'] }}</p>
            <p>Subscribers: {{ $item['statistics']['subscriberCount'] }}</p>
            <p>Views: {{ $item['statistics']['viewCount'] }}</p>
            <p>Videos: {{ $item['statistics']['videoCount'] }}</p>
        @endforeach
    @else
        <p>No statistics available.</p>
    @endif


</div>
