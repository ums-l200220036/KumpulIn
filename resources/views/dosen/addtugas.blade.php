<x-navigasi>
    @section('title', 'Tambah Tugas')
    
    <!-- component -->
    <div class="flex items-center justify-center p-12">
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="mx-auto w-full max-w-[550px] bg-white">
        <form
            class="py-6 px-9"
            action="{{ route('dosen.addtugas') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            <div class="mb-5">
            <label
                for="judul"
                class="mb-3 block text-base font-medium text-[#07074D]"
            >
                Judul tugas :
            </label>
            <input
                type="text"
                name="judul"
                id="judul"
                placeholder="masukkan judul tugas"
                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            />
            </div>

            <div class="mb-5">
                <label
                    for="deskripsi"
                    class="mb-3 block text-base font-medium text-[#07074D]"
                >
                    Deskripsi Tugas :
                </label>
                <textarea 
                    type="text" 
                    name="deskripsi" 
                    id="deskripsi" 
                    placeholder="masukkan deskripsi" 
                    cols="5" 
                    rows="5" 
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                </textarea>
            </div>

            <div class="mb-5">
                <label for="semester" class="mb-3 block text-base font-medium text-[#07074D]">
                    Pilih Semester:
                </label>
                <select 
                    name="semester" 
                    id="semester" 
                    required 
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                >
                    <option value="" disabled selected>Pilih Semester</option>
                    <option value="1">Semester 1</option>
                    <option value="2">Semester 2</option>
                    <option value="3">Semester 3</option>
                    <option value="4">Semester 4</option>
                    <option value="5">Semester 5</option>
                    <option value="6">Semester 6</option>
                    <option value="7">Semester 7</option>
                    <option value="8">Semester 8</option>
                </select>
            </div>
    
            <div class="mb-6 pt-4">
            <label class="mb-5 block text-xl font-semibold text-[#07074D]">
                Upload File
            </label>
    
            <div class="mb-8">
                <label for="file" x-data="{ fileName: '' }" class="flex rounded-lg flex-col items-center justify-center min-h-[180px] border border-dashed border-gray-300 p-5 text-center cursor-pointer hover:bg-gray-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                    </svg>
                    <input type="file" name="file" id="file" accept=".pdf,.docx,.xlsx,.pptx,.zip" class="hidden" 
                        @change="fileName = $event.target.files.length > 0 ? $event.target.files[0].name : ''">
                    <span class="text-gray-600 text-sm" x-text="fileName || 'Klik untuk unggah atau seret file ke sini'"></span>
                </label>

            </div>
            <!-- formbold -->
            <div>
            <button type="submit" class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">Submit</button>
            </div>
        </form>
        </div>
    </div>
</x-navigasi>