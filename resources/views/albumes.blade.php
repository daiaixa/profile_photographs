<x-layout>

        @if ($albums->isEmpty())
            <p class="text-center text-gray-500">No hay álbumes disponibles.</p>
        @else
            @foreach ($albums as $album)
                <div class="grid grid-cols-6 gap-4 p-4 bg-gray-100 rounded-lg mb-4">
                    <!-- Título -->
                    <div class="col-span-6">
                        <h1 class="text-xl font-bold text-center">{{ $album->title }}</h1>
                    </div>

                    <!-- Foto -->
                    <div class="col-span-3">
                        <img src="{{ $album->image_url }}" alt="{{ $album->title }}" class="w-full h-auto rounded-md">
                    </div>

                    <!-- Descripción -->
                    <div class="col-span-3 flex items-center">
                        <p>{{ $album->description }}</p>
                    </div>
                </div>
            @endforeach
        @endif


        <div class="grid grid-cols-6 gap-4 p-4 bg-gray-100 rounded-lg mb-4">
            <!-- Título -->
            <div class="col-span-6">
                <h1 class="text-xl font-bold text-center"> HOLOAAA</h1>
            </div>

            <!-- Foto -->
            <div class="col-span-3">
                <img src="" alt="" class="w-full h-auto rounded-md">
                <H1>ESTO ES UN A IMAGEN</H1>
            </div>

            <!-- Descripción -->
            <div class="col-span-3 flex items-center">
                <p>Y ESTO UNA DESCRIPCION</p>
            </div>
        </div>



</x-layout>
