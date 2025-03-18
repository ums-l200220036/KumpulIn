<x-navigasi>
@section('title', 'Tambah Dosen')

<!-- component -->
<div class="mt-6 items-center flex justify-center">
    
        <form id="form" action="{{ route('input.dosen') }}" method="POST" class="bg-white w-[40%] shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <h1 class="block text-gray-700 font-bold mb-2 text-xl text-center">TAMBAHKAN DATA DOSEN</h1>
            <br>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    NIDN
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="nidn" id="nidn" type="text" placeholder="Masukkan NIDN" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Nama Dosen
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="nama" id="nama" type="text" placeholder="Masukkan Nama" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Mata Kuliah
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="mata_kuliah" id="mata_kuliah" type="text" placeholder="Masukkan Mata Kuliah" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Password
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="password_ds" id="password_ds" type="password" placeholder="Masukkan Password" required>
            </div>
            
            <div class="flex items-center justify-between">
                <button id="submit" name="submit"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    <i class=""></i>Submit
                </button>
            </div>

            <div class="mb-4">

 
        </form>
        
    </div>
    <script src="https://kit.fontawesome.com/1e268974cb.js" crossorigin="anonymous"></script>

</x-navadmin>