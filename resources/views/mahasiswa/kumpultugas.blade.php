<x-navigasi>
    @section('title', 'Tugas')
    <div class="pt-6">
        <h1 class="font-bold text-3xl">Tugas Minggu Ke 4, Sistem Informasi Di Bidang Medis</h1>
        <h4 class="text-lg text-blue-400 font-medium">Sistem Informasi</h4>
        <p class="w-1/2 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi soluta quod cum, pariatur architecto dolore dolores vitae similique tempora amet aspernatur totam laborum dicta mollitia natus doloribus alias officia ipsam.</p>
        <a href="pengenalan-pemrograman-mobile.pdf" target="_blank" class="flex items-center text-blue-500 underline hover:underline">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2">
                <path fill-rule="evenodd" d="M2 3.5A1.5 1.5 0 0 1 3.5 2h9A1.5 1.5 0 0 1 14 3.5v11.75A2.75 2.75 0 0 0 16.75 18h-12A2.75 2.75 0 0 1 2 15.25V3.5Zm3.75 7a.75.75 0 0 0 0 1.5h4.5a.75.75 0 0 0 0-1.5h-4.5Zm0 3a.75.75 0 0 0 0 1.5h4.5a.75.75 0 0 0 0-1.5h-4.5ZM5 5.75A.75.75 0 0 1 5.75 5h4.5a.75.75 0 0 1 .75.75v2.5a.75.75 0 0 1-.75.75h-4.5A.75.75 0 0 1 5 8.25v-2.5Z" clip-rule="evenodd" />
                <path d="M16.5 6.5h-1v8.75a1.25 1.25 0 1 0 2.5 0V8a1.5 1.5 0 0 0-1.5-1.5Z" />
            </svg>
            <span class="font-medium">Pengenalan Pemrograman Mobile.pdf</span>
        </a>
    </div>

    <form action="" class="w-1/2 mt-5">
        <div class="mb-8">
            <input type="file" name="file" id="file" class="sr-only" />
            <label for="file" class="relative flex min-h-[200px] items-center justify-center rounded-md border border-dashed border-[#e0e0e0] p-12 text-center">
                <div>
                    <span class="mb-2 block text-xl font-semibold text-[#07074D]">
                        Drop files here
                    </span>
                    <span class="mb-2 block text-base font-medium text-[#6B7280]">
                        Or
                    </span>
                    <span class="inline-flex rounded border border-[#e0e0e0] py-2 px-7 text-base font-medium text-[#07074D]">
                        Browse
                    </span>
                </div>
            </label>
        </div>
        <button type="submit" class="flex bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 w-[120px] rounded justify-center items-center">Submit</button>
    </form>
</x-navigasi>