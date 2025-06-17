@extends('layout.layout')
@php
    $title='Pation Queue';
    $subTitle = 'List';
    $script='<script src="' . asset('assets/js/data-table.js') . '"></script>';
@endphp

@section('content')
<div class="card border-0 overflow-hidden h-full">
    <div class="card-header flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white">Daftar Antrian</h2>
        <div class="space-x-2">
            <button onclick="openModal('addPatientModal')" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Tambah Pasien
            </button>
            <button onclick="openModal('addQueueModal')" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                + Tambah Antrian
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table border-0 mb-0">
                <thead>
                    <tr>
                        <th class="!rounded-s-none">No</th>
                        <th class="">Nama</th>
                        <th class="">Umur</th>
                        <th class="">Waktu Masuk</th>
                        <th class="">Status</th>
                        <th class="">Detail</th>
                        <th class="!rounded-e-none">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($queues as $i => $queue)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $i + 1 }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">{{ $queue->patient->full_name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">{{ $queue->patient->age }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">{{ \Carbon\Carbon::parse($queue->time)->format('H:i') }}</td>
                        <td class="px-6 py-4 text-sm capitalize text-white">
                            <span class="px-2 py-1 rounded text-xs
                                @if($queue->status == 'red') bg-red-500
                                @elseif($queue->status == 'yellow') bg-yellow-500
                                @else bg-green-500 @endif">
                                {{ $queue->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-blue-600 dark:text-blue-400">
                            <a href="#">Lihat</a>
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <div class="flex space-x-2">
                                <form action="#" method="POST">@csrf
                                    <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 text-xs rounded">Progress</button>
                                </form>
                                <form action="#" method="POST">@csrf
                                    <button class="bg-green-600 hover:bg-green-700 text-white px-2 py-1 text-xs rounded">Done</button>
                                </form>
                                <form action="#" method="POST">@csrf @method('DELETE')
                                    <button class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 text-xs rounded">Cancel</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-gray-500 dark:text-gray-300 py-4">Belum ada antrian</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div><!-- card end -->
@endsection
<div id="addPatientModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white dark:bg-neutral-800 p-6 rounded-lg shadow-lg w-[50%] max-w-md">
        <h3 class="text-lg font-semibold mb-4 text-neutral-900 dark:text-white">Tambah Pasien</h3>
        {{-- <form action="{{ route('regist_patient') }}" method="POST">@csrf
            <input type="text" name="full_name" placeholder="Nama Lengkap" class="w-full mb-3 p-2 border rounded" required>
            <input type="text" name="age" placeholder="Umur" class="w-full mb-3 p-2 border rounded" required>
            <input type="text" name="address" placeholder="Alamat" class="w-full mb-3 p-2 border rounded">
            <div class="flex justify-end gap-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                <button type="button" onclick="closeModal('addPatientModal')" class="text-gray-500">Batal</button>
            </div>
        </form> --}}
    </div>
</div>

<div id="addQueueModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white dark:bg-neutral-800 p-6 rounded-lg shadow-lg w-[90%] max-w-md">
        <h3 class="text-lg font-semibold mb-4 text-neutral-900 dark:text-white">Tambah Antrian</h3>
        <form action="{{ route('add_queue') }}" method="POST">@csrf
            <select name="patient_id" class="w-full mb-3 p-2 border rounded" required>
                <option value="">Pilih Pasien</option>
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->full_name }}</option>
                @endforeach
            </select>
            <select name="triage_id" class="w-full mb-3 p-2 border rounded" required>
                <option value="">Pilih Triage</option>
                @foreach ($triages as $triage)
                    <option value="{{ $triage->id }}">{{ $triage->name }}</option>
                @endforeach
            </select>
            <div class="flex justify-end gap-2">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
                <button type="button" onclick="closeModal('addQueueModal')" class="text-gray-500">Batal</button>
            </div>
        </form>
    </div>
</div>
<!-- Modal Tambah Pasien -->
<!-- Modal Tambah Pasien -->

<!-- Modal Tambah Antrian -->


<script>
function openModal(id) {
    document.getElementById(id).classList.remove('hidden');
}
function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
}
</script>