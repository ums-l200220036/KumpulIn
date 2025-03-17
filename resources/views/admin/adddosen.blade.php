<x-navadmin>

<!-- component -->
<div class="mt-6 items-center flex justify-center">
        
        <form id="form" class="bg-white w-[50%] shadow-md rounded px-8 pt-6 pb-8 mb-4">
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
                    Password
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="password" id="password" type="password" placeholder="Masukkan Password" required>
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