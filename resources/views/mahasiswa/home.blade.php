<x-navigasi>
    @section('title', 'Home')

    <h1 class="text-2xl font-bold">Daftar Tugas</h1>
    
    <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-4">
        @foreach($tugas as $item)
            <a href="{{ route('tugas.kumpul', ['id_tugas' => $item->id_tugas]) }}" class="block">
                <div class="bg-white p-4 rounded-xl shadow-lg flex items-center justify-between hover:bg-gray-100 transition">
                    <div>
                        <p class="font-semibold text-lg">{{ $item->judul }}</p>
                        <p class="text-gray-500 text-sm">{{ $item->deskripsi }}</p>
                        @if($item->file)
                            <a href="{{ asset('storage/' . $item->file) }}" class="text-blue-500 text-sm font-semibold mt-2 block" target="_blank">
                                Lihat File
                            </a>
                        @endif
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</x-navigasi>