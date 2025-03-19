<x-navigasi>
    @section('title', 'Tugas')
    <div class="pt-6 w-1/2">
        <h1 class="font-bold text-3xl">Tugas Minggu Ke 4, Sistem Informasi Di Bidang Medis</h1>
        <h4 class="text-lg text-blue-400 font-medium">Sistem Informasi</h4>
        <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi soluta quod cum, pariatur architecto dolore dolores vitae similique tempora amet aspernatur totam laborum dicta mollitia natus doloribus alias officia ipsam.</p>
        <div>
            <a href="block-pemrograman-mobile.pdf" target="_blank" class="flex w-auto text-blue-500 underline">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2">
                    <path fill-rule="evenodd" d="M2 3.5A1.5 1.5 0 0 1 3.5 2h9A1.5 1.5 0 0 1 14 3.5v11.75A2.75 2.75 0 0 0 16.75 18h-12A2.75 2.75 0 0 1 2 15.25V3.5Zm3.75 7a.75.75 0 0 0 0 1.5h4.5a.75.75 0 0 0 0-1.5h-4.5Zm0 3a.75.75 0 0 0 0 1.5h4.5a.75.75 0 0 0 0-1.5h-4.5ZM5 5.75A.75.75 0 0 1 5.75 5h4.5a.75.75 0 0 1 .75.75v2.5a.75.75 0 0 1-.75.75h-4.5A.75.75 0 0 1 5 8.25v-2.5Z" clip-rule="evenodd" />
                    <path d="M16.5 6.5h-1v8.75a1.25 1.25 0 1 0 2.5 0V8a1.5 1.5 0 0 0-1.5-1.5Z" />
                </svg>
                <span class="font-medium">Pengenalan Pemrograman Mobile.pdf</span>
            </a>
        </div>
    </div>

    <form class="w-1/2 mt-5 bg-white p-6 rounded-lg shadow-md" action="{{ route('mahasiswa.kumpul') }}" method="post" enctype="multipart/form-data" x-data="{ fileName: '', fileType: '' }">
        @csrf
        <h1 class="">Submit Tugas anda di Sini</h1>
        <label for="file" class="flex flex-col items-center justify-center min-h-[180px] rounded-lg border border-dashed border-gray-300 p-5 text-center cursor-pointer hover:bg-gray-50 transition">
            <!-- Heroicons Cloud Upload (sesuai request) -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-gray-500 mb-2">
                <path fill-rule="evenodd" d="M10.5 3.75a6 6 0 0 0-5.98 6.496A5.25 5.25 0 0 0 6.75 20.25H18a4.5 4.5 0 0 0 2.206-8.423 3.75 3.75 0 0 0-4.133-4.303A6.001 6.001 0 0 0 10.5 3.75Zm2.03 5.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 1 0 1.06 1.06l1.72-1.72v4.94a.75.75 0 0 0 1.5 0v-4.94l1.72 1.72a.75.75 0 1 0 1.06-1.06l-3-3Z" clip-rule="evenodd" />
            </svg>
            <span class="text-gray-600 text-sm" x-text="fileName ? fileName + ' (' + fileType + ')' : 'Klik untuk unggah atau seret file ke sini'"></span>
            <input type="file" name="file" id="file" accept="" class="hidden" @change="let file = $event.target.files[0]; fileName = file ? file.name : ''; fileType = file ? file.type.split('/')[1].toUpperCase() : '';">
        </label>

        <button type="submit" class="mt-4 font-medium w-1/6 bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
            Submit
        </button>
    </form>
</x-navigasi>