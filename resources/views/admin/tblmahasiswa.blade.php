<x-navigasi>
  @section('title', 'Daftar Mahasiswa')

  <a href="{{ route('form.mhs') }}" class="flex mt-6 bg-green-500 hover:bg-green-600 text-white font-bold py-1 w-[120px] rounded justify-center items-center gap-2">
    <span class="text-xl">+</span> Tambah
  </a>
  
  <div class="flex flex-col mt-4" x-data="{ showEdit: false, selectedMahasiswa: {} }">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
          <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Nama Mahasiswa</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">NIM</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Semester</th>
                <th class="relative px-6 py-3"><span class="sr-only">Aksi</span></th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach ($mhs as $m)
              <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 w-10 h-10">
                      <img class="w-10 h-10 rounded-full" src="https://avatars.githubusercontent.com/u/57622665" alt="Foto Mahasiswa" />
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">{{ $m->nama }}</div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ strval($m->nim) }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $m->semester }}</td>
                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                  <button @click="showEdit = true; selectedMahasiswa = {{ json_encode($m) }}" class="text-indigo-600 hover:text-indigo-900">Edit</button>
                  <form action="{{ route('mahasiswa.destroy', $m->nim) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700 hover:underline">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Popup Edit -->
    <div x-show="showEdit" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
      <div class="bg-white rounded-lg shadow-lg w-96 p-6">
        <h2 class="text-xl font-semibold text-gray-800">Edit Mahasiswa</h2>
        <form method="POST" :action="'/mahasiswa/' + selectedMahasiswa.nim">
          @csrf
          @method('PUT')

          <div class="mt-4">
            <label class="block text-gray-700">Nama</label>
            <input type="text" name="nama" class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" x-model="selectedMahasiswa.nama">
          </div>

          <div class="mt-4">
            <label class="block text-gray-700">NIM</label>
            <input type="text" name="nim" class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" x-model="selectedMahasiswa.nim" readonly>
          </div>

          <div class="mt-4">
            <label class="block text-gray-700">Semester</label>
            <input type="text" name="semester" class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" x-model="selectedMahasiswa.semester">
          </div>

          <div class="mt-6 flex justify-end">
            <button type="button" @click="showEdit = false" class="px-4 py-2 text-gray-500 bg-gray-200 rounded-lg hover:bg-gray-300">Batal</button>
            <button type="submit" class="px-4 py-2 ml-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-navigasi>
