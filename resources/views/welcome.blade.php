<x-layout>
    <header id="header">
        <a href="index.html" class="logo">{{ $user->name }}</a>
        <p>Fotografo</p>
    </header>

    <!-- Nav -->
    <x-nav />

    <!-- Main -->
    <div id="main">
        <!-- FOTOGRAFIAS -->
        <div class="post featured">
            <header class="major">
                <h2 class="about">Acerca de mi</h2>
                <p>{{ $user->about_me }}</p>
            </header>
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

</x-layout>
