<x-navigasi>
    @section('title', 'Tugas Terkumpul')

    <div class="flex flex-col mt-4" x-data="{ showEdit: false, selectedDosen: {} }">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
              <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Nama Mahasiswa</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">NIM</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Submission</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Last Modified</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">File</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($kumpuls as $kumpul)
                  <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="flex-shrink-0 w-10 h-10">
                          <img class="w-10 h-10 rounded-full" src="https://avatars.githubusercontent.com/u/57622665" alt="Foto Mahasiswa" />
                        </div>
                        <div class="ml-4">
                          <div class="text-sm font-medium text-gray-900">{{ $kumpul->nama_mahasiswa }}</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $kumpul->nim }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $kumpul->submission_status }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $kumpul->updated_at->format('d-m-Y') }}</td>
                    <td class="flex justify-center items-center gap-1 px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-500">
                        <a href="{{ route('kumpul.view', $kumpul->id_pt) }}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75v6.75m0 0-3-3m3 3 3-3m-8.25 6a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                            </svg>
                            <button>View</button>
                        </a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</x-navigasi>
