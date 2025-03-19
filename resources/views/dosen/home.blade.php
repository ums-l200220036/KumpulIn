<x-navigasi>
    @section('title', 'Home')
    
    <a href="{{ route('add.tugas') }}" class="flex mt-6 bg-green-500 hover:bg-green-600 text-white font-bold py-1 w-[120px] rounded justify-center items-center gap-2">
        <span class="text-xl">+</span> Buat Tugas
    </a>
    
    <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-4">
        @isset($tugas)
        @foreach($tugas as $item)
            <div class="bg-white p-3 rounded-xl shadow-xl flex items-center justify-between mt-4">
                <div class="flex space-x-6 items-center">
                    <img src="https://i.pinimg.com/originals/25/0c/a0/250ca0295215879bd0d53e3a58fa1289.png" class="w-auto h-24 rounded-lg"/>
                    <div>
                        <p class="font-semibold text-base">{{ $item->judul }}</p>
                        <p class="font-semibold text-xs text-gray-400">Dibuat : {{ $item->created_at->format('d F Y') }}</p>
                        <a href="{{ asset('storage/' . $item->file) }}" class="text-blue-500 text-sm" target="_blank">Lihat File</a>
                    </div>              
                </div>
            </div>
        @endforeach
    @else
        <p class="text-gray-500">Belum ada tugas yang ditambahkan.</p>
    @endisset
    </div>    
</x-navigasi>

