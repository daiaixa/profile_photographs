<x-layout :user="$user">
    <div id="main">
        <div class="content-posts">
            <div class="posts">
                @foreach ($photos as $photo)
                    <div class="content-photo">
                        <img src="{{ $photo->image_url }}" alt="foto" class="photo">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>