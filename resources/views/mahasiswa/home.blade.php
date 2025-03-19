<x-navigasi>
    @section('title', 'Home')    
    <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-4">
        @isset($tugas)
        @foreach($tugas as $item)
            <div  class="bg-white p-3 rounded-xl shadow-xl flex items-center justify-between mt-4">
                <div class="flex space-x-6 items-center">
                    <img src="https://i.pinimg.com/originals/25/0c/a0/250ca0295215879bd0d53e3a58fa1289.png" class="w-auto h-24 rounded-lg"/>
                    <div>
                        <p class="font-semibold text-base">{{ $item->judul }}</p>
                        <p class="font-semibold text-xs text-gray-400">Dibuat : {{ $item->created_at->format('d F Y') }}</p>
                        <a href="{{ route('tugas.kumpul', ['id_tugas' => $item->id_tugas]) }}" class="mt-4 items-center gap-1 text-blue-500 text-sm flex" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            View Tugas
                        </a>
                    </div>

                </div>

            </div>
        @endforeach
    @else
        <p class="text-gray-500">Belum ada tugas yang ditambahkan.</p>
    @endisset
    </div>    
</x-navigasi>