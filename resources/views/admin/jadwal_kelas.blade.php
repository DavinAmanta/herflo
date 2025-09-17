    @extends('layout.main')
    @section('content')
    <div class="d-flex">
        <h1 class="text-xl sm:text-2xl font-semibold text-gray-900 mb-4">Halaman Jadwal Kelas</h1>
        <button type="button" data-modal-toggle="add-jadwal_kelas-modal"
            class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2 text-center sm:ml-auto">
            <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                    clip-rule="evenodd"></path>
            </svg>
            Tambah Jadwal Kelas
        </button>
        <table class="table-fixed min-w-full divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden mt-3">
            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                        No
                    </th>
                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                        Nama Kelas
                    </th>
                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                        Nama Instruktur
                    </th>
                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                        Hari
                    </th>
                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                        Jam Mulai
                    </th>
                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                        Jam Selesai
                    </th>
                    <th scope="col" class="p-4 text-center text-xs font-medium text-gray-500 uppercase">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($jadwal as $u)
                <tr class="hover:bg-gray-100">
                    <td class="p-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ $loop->iteration }}
                    </td>
                    <td class="p-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ $u->nama_kelas }}
                    </td>
                    <td class="p-4 whitespace-nowrap text-sm text-gray-700">
                        {{ $u->instruktur->user->name }}
                    </td>
                    <td class="p-4 whitespace-nowrap text-sm text-gray-700">
                        {{ $u->hari }}
                    </td>
                    <td class="p-4 whitespace-nowrap text-sm text-gray-700">
                        {{ $u->jam_mulai }}
                    </td>
                    <td class="p-4 whitespace-nowrap text-sm text-gray-700">
                        {{ $u->jam_selesai }}
                    </td>
                    <td class="p-4 whitespace-nowrap space-x-2 text-center">
                        <button type="button" data-modal-toggle="edit-jadwal_kelas-modal-{{ $u->id }}"
                            class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2">
                            <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                </path>
                                <path fill-rule="evenodd"
                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Edit
                        </button>
                        <form action="{{ route('jadwal.destroy', $u->id) }}" method="POST" class="inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 delete-confirm">
                                <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah jadwal_kelas -->
    <div id="add-jadwal_kelas-modal"
        class="hidden fixed top-0 left-0 right-0 z-50 w-full h-full flex items-center justify-center bg-black/50">
        <div class="bg-white rounded-lg shadow w-full max-w-2xl relative">
            <!-- Header Modal -->
            <div class="flex items-start justify-between p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold">Tambah Jadwal Kelas</h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-toggle="add-jadwal_kelas-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <form action="{{ route('jadwal.store') }}" method="POST" class="p-6 space-y-6">
                @csrf
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="nama_kelas" class="text-sm font-medium text-gray-900 block mb-2">Nama Kelas</label>
                        <input type="text" name="nama_kelas" id="nama_kelas"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                            placeholder="Nama Kelas" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label class="text-sm font-medium text-gray-900 block mb-2">Nama Instruktur</label>
                        <select name="id_instruktur" id="id_instruktur"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                            required>
                            @foreach ($instruktur as $aa)
                            <option value="{{ $aa->user->id }}">{{ $aa->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label class="text-sm font-medium text-gray-900 block mb-2">Hari</label>
                        <select name="hari" id="hari"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                            required>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                            <option value="Minggu">Minggu</option>
                        </select>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label class="text-sm font-medium text-gray-900 block mb-2">Jam Mulai</label>
                        <input type="time" name="jam_mulai" id="jam_mulai"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                            placeholder="Jam Mulai" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label class="text-sm font-medium text-gray-900 block mb-2">Jam Selesai</label>
                        <input type="time" name="jam_selesai" id="jam_selesai"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                            placeholder="Jam Selesai" required>
                    </div>
                </div>
                <div class="flex justify-end pt-4 border-t border-gray-200">
                    <button type="submit"
                        class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 mt-3">
                        Simpan Jadwal Kelas
                    </button>
                </div>
            </form>
        </div>
    </div>
    @foreach ($jadwal as $aa)
    <!-- Modal Edit -->
    <div id="edit-jadwal_kelas-modal-{{ $aa->id }}"
        class="hidden fixed top-0 left-0 right-0 z-50 w-full h-full flex items-center justify-center bg-black/50">
        <div class="bg-white rounded-lg shadow w-full max-w-2xl relative">
            <!-- Header Modal -->
            <div class="flex items-start justify-between p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold">Edit Jadwal Kelas</h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-toggle="edit-jadwal_kelas-modal-{{ $aa->id }}">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <!-- Form Edit -->
            <form action="{{ route('jadwal.update', $aa->id) }}" method="POST" class="p-6 space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="nama_kelas" class="text-sm font-medium text-gray-900 block mb-2">Nama Kelas</label>
                        <input type="text" name="nama_kelas" id="nama_kelas"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                            placeholder="Nama Kelas" required value="{{ $aa->nama_kelas }}">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label class="text-sm font-medium text-gray-900 block mb-2">Nama Instruktur</label>
                        <select name="id_instruktur" id="id_instruktur"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                            required>
                            @foreach ($instruktur as $ins)
                            <option value="{{ $ins->id }}" {{ $aa->id_instruktur == $ins->id ? 'selected' : '' }}>
                                {{ $ins->user->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label class="text-sm font-medium text-gray-900 block mb-2">Hari</label>
                        <select name="hari" id="hari"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                            required>
                            @php $selectedHari = $aa->hari; @endphp
                            <option value="Senin" {{ $selectedHari == 'Senin' ? 'selected' : '' }}>Senin</option>
                            <option value="Selasa" {{ $selectedHari == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                            <option value="Rabu" {{ $selectedHari == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                            <option value="Kamis" {{ $selectedHari == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                            <option value="Jumat" {{ $selectedHari == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                            <option value="Sabtu" {{ $selectedHari == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                            <option value="Minggu" {{ $selectedHari == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                        </select>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label class="text-sm font-medium text-gray-900 block mb-2">Jam Mulai</label>
                        <input type="time" name="jam_mulai" id="jam_mulai"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                            placeholder="Jam Mulai" required value="{{ $aa->jam_mulai }}">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label class="text-sm font-medium text-gray-900 block mb-2">Jam Selesai</label>
                        <input type="time" name="jam_selesai" id="jam_selesai"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                            placeholder="Jam Selesai" required value="{{ $aa->jam_selesai }}">
                    </div>
                </div>

                <!-- Tombol Simpan -->
                <div class="flex justify-end pt-4 border-t border-gray-200">
                    <button type="submit"
                        class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 mt-3">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
    @endsection
