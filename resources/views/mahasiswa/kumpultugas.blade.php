<x-navigasi>
    @section('title', 'Kumpul Tugas')

    <div class="w-1/2 pt-6">
        <h1 class="font-bold text-3xl">{{ $tugas->judul }}</h1>
        <p class="text-justify">{{ $tugas->deskripsi }}</p>

        @if(!empty($tugas->file))
            <div>
                <a href="{{ asset('storage/' . $tugas->file) }}" target="_blank" class="text-blue-500 underline flex gap-1 items-center mt-3">
                    Download file tugas 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 13.5 3 3m0 0 3-3m-3 3v-6m1.06-4.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                    </svg>
                </a>
            </div>
        @endif
    </div>

    <div class="w-1/2 border-b border-dashed border-gray-300 p-2">
    </div>

    <form class="mt-5" action="{{ route('mahasiswa.kumpul', ['id_tugas' => $tugas->id_tugas]) }}" method="POST" enctype="multipart/form-data">
        @csrf    

        <h1>Submit Tugas Anda</h1>
        <label for="file" x-data="{ fileName: '' }" class="flex rounded-lg w-1/2 flex-col items-center justify-center min-h-[180px] border border-dashed border-gray-300 p-5 text-center cursor-pointer hover:bg-gray-50 transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
            </svg>
            <input type="file" name="file" id="file" accept=".pdf,.docx,.xlsx,.pptx,.zip" class="hidden" 
                @change="fileName = $event.target.files.length > 0 ? $event.target.files[0].name : ''">
            <span class="text-gray-600 text-sm" x-text="fileName || 'Klik untuk unggah atau seret file ke sini'"></span>
        </label>

        <button type="submit" class="mt-4 bg-blue-600 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-700 hover:shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
            Submit
        </button>

    </form>
</x-navigasi>