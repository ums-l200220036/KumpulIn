<x-navigasi>
    @section('title', 'Kumpul Tugas')

    <div class="w-1/2 pt-6">
        <h1 class="font-bold text-3xl">{{ $tugas->judul }}</h1>
        <h4 class="text-lg text-blue-400 font-medium">Sistem Informasi</h4>
        <p class="text-justify">{{ $tugas->deskripsi }}</p>

        @if(!empty($tugas->file))
            <div>
                <a href="{{ asset('storage/' . $tugas->file) }}" target="_blank" class="text-blue-500 underline">
                    Lihat File Tugas
                </a>
            </div>
        @endif
    </div>

    <form action="{{ route('mahasiswa.kumpul', ['id_tugas' => $tugas->id_tugas]) }}" method="POST" enctype="multipart/form-data">
        @csrf    

        <h1>Submit Tugas Anda</h1>
        <label for="file" class="flex flex-col items-center justify-center min-h-[180px] border border-dashed border-gray-300 p-5 text-center cursor-pointer hover:bg-gray-50 transition">
            <input type="file" name="file" id="file" accept=".pdf,.docx,.xlsx,.pptx,.zip" class="hidden">
            <span class="text-gray-600 text-sm">Klik untuk unggah atau seret file ke sini</span>
        </label>

        <button type="submit" class="mt-4 bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
            Submit
        </button>
    </form>
</x-navigasi>