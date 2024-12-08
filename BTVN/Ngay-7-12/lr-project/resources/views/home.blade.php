<div>
    <!-- It is never too late to be what you might have been. - George Eliot -->
    @foreach (posts as post)
        <div>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
        </div>
    @endforeach     
</div>
