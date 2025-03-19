<x-navigasi>
    @section('title', 'Home')
    <a href="{{ route('form.dosen') }}" class="flex mt-6 bg-green-500 hover:bg-green-600 text-white font-bold py-1 w-[120px] rounded justify-center items-center gap-2">
        <span class="text-xl">+</span> Buat Tugas
    </a>
    <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-4 ">
        <!-- Start Card List -->
        <div class="bg-white p-3 rounded-xl shadow-xl flex items-center justify-between mt-4">
            <div class="flex space-x-6 items-center">
                <img src="https://i.pinimg.com/originals/25/0c/a0/250ca0295215879bd0d53e3a58fa1289.png" class="w-auto h-24 rounded-lg"/>
                <div>
                    <p class="font-semibold text-base">Sistem Informasi</p>
                    <p class="font-semibold text-sm text-gray-400">Tuags Minggu ke 12</p>
                </div>              
            </div>
               
            <div class="flex space-x-2 items-center">
                <div class="bg-gray-300 rounded-md p-2 flex items-center">
                    <i class="fas fa-chevron-right my-1 fa-sm text-black"></i>
                </div>
            </div>    
        </div>
    </div>    
</x-navigasi>