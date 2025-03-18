<x-navigasi>
  @section('title', 'Daftar Dosen')
  
  <div class="flex flex-col mt-6" x-data="popup">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
          <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                  Nama Dosen
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                  NIDN
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                  Mata Kuliah
                </th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach ($dosen as $d)
              <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                <!-- Nama Dosen + Gambar -->
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 w-10 h-10">
                      <img
                        class="w-10 h-10 rounded-full"
                        src="https://avatars0.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                        alt="Foto Dosen"
                      />
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">{{ $d->nama }}</div>
                    </div>
                  </div>
                </td>
  
                <!-- NIDN -->
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm font-medium text-gray-900">{{ $d->nidn }}</div>
                </td>
  
                <!-- Mata Kuliah -->
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm font-medium text-gray-900">{{ $d->mata_kuliah }}</div>
                </td>
  
                <!-- Tombol Edit -->
                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                  <button @click="openEditPopup({ nama: '{{ $d->nama }}', nidn: '{{ $d->nidn }}', mata_kuliah: '{{ $d->mata_kuliah }}' })" class="text-indigo-600 hover:text-indigo-900">
                    Edit
                  </button>
                  <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Popup Form Edit -->
    <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
      <div class="bg-white p-8 rounded-lg shadow-lg w-1/3">
        <h2 class="text-xl font-bold mb-4">Edit Dosen</h2>
        <form action="{{ route('update.dosen') }}" method="POST">
          @csrf
          @method('PUT')
          <input type="hidden" name="nidn" x-model="editData.nidn">
          <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Dosen</label>
            <input type="text" name="nama" id="nama" x-model="editData.nama" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
          </div>
          <div class="mb-4">
            <label for="nidn" class="block text-sm font-medium text-gray-700">NIDN</label>
            <input type="text" name="nidn" id="nidn" x-model="editData.nidn" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
          </div>
          <div class="mb-4">
            <label for="mata_kuliah" class="block text-sm font-medium text-gray-700">Mata Kuliah</label>
            <input type="text" name="mata_kuliah" id="mata_kuliah" x-model="editData.mata_kuliah" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
          </div>
          <div class="flex justify-end">
            <button type="button" @click="closeEditPopup" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">
              Batal
            </button>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
              Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-navigasi>

<script>
  document.addEventListener('alpine:init', () => {
    Alpine.data('popup', () => ({
      open: false,
      editData: {
        nama: '',
        nidn: '',
        mata_kuliah: ''
      },
      openEditPopup(dosen) {
        this.editData = { ...dosen };
        this.open = true;
      },
      closeEditPopup() {
        this.open = false;
        this.editData = { nama: '', nidn: '', mata_kuliah: '' };
      }
    }));
  });
</script>

<!-- Alpine.js untuk mengontrol popup -->
<script>
  document.addEventListener('alpine:init', () => {
    Alpine.data('popup', () => ({
      open: false, // Inisialisasi sebagai false
      editData: {
        nama: '',
        nidn: '',
        mata_kuliah: ''
      }
    }));
  });
</script>