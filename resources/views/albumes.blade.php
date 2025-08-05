<x-layout :user="$user">
    <div id="main">
        <!-- FOTOGRAFIAS -->
        <div class="post featured">
            <div class="content-album">
                @if ($albums->isEmpty())
                    <p class="text-center text-gray-500">No hay álbumes disponibles.</p>
                @else
                    @foreach ($albums as $album)
                        <div class="style2">
                        <a href="{{ route('show-album', $album->id) }}" data-turbolinks="false" class="album-link">
                            <div class="image-container">
                                <span class="image">
                                    <img src="{{ $album->image_url }}" alt="{{ $album->title }}" />
                                </span>
                            </div>
                            <div class="text-content">
                                <h2>{{ $album->title }}</h2>
                                <div class="content">
                                    <p>{{ $album->description }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-layout>
