<x-navigasi>
@section('title', 'Tambah Mahasiswa')

<!-- component -->
<div class="mt-6 items-center flex justify-center">
        
        <form id="form" action="{{ route('input.mahasiswa') }}" method="POST" class="bg-white w-[40%] shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <h1 class="block text-gray-700 font-bold mb-2 text-xl text-center">TAMBAHKAN DATA MAHASISWA</h1>
            <br>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    NIM
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="nim" id="nim" type="text" placeholder="Masukkan NIM" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Nama Mahasiswa
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="nama" id="nama" type="text" placeholder="Masukkan Nama" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Semester
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="semester" id="semester" type="text" placeholder="Masukkan Semester" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Password
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="password_ms" id="password_ms" type="password" placeholder="Masukkan Password" required>
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
    {{-- @if(session('success'))
        <script>
            Swal.fire({
                title: "Success!",
                text: "{{ session('success') }}",
                icon: "success",
                confirmButtonText: "OK"
            });
        </script>
    @endif --}}

    
</x-navadmin>