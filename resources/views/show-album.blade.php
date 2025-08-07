<x-layout :user="$user">
    <div id="main">

        <!-- Titulo y descripcion -->
        <div class="content">
            <div class="content-text">
                <h1>{{$album->title}}</h1>
            </div>
            <div class="content-text">
                {{$album->description}}
            </div>
        </div>

        <div class="content-posts">
            <div class="posts">
                @foreach ($photos as $photo)
                    <div class="content-photo">
                        <img src="{{ $photo->image_url }}" alt="foto" class="photo">
                    </div>
                @endforeach
            </div>
        </div>

        <footer>
            <div class="pagination">
                {{ $photos->links('pagination.paginas') }}
            </div>
        </footer>
    </div>
</x-layout >