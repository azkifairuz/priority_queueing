@extends('layout.layout')
@php
    $title='Pation Queue';
    $subTitle = 'List';
    $script='<script src="' . asset('assets/js/data-table.js') . '"></script>';
@endphp

@section('content')
<div class="px-4 py-6">
    <div class="flex justify-between items-center mb-4">
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

    <div class="overflow-x-auto bg-white dark:bg-neutral-800 shadow rounded-lg border border-gray-200 dark:border-neutral-600">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
            <thead class="bg-gray-100 dark:bg-neutral-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Umur</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Waktu Masuk</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Detail</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-neutral-800 divide-y divide-gray-200 dark:divide-neutral-700">
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

<div id="addPatientModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
    <div class="bg-white dark:bg-neutral-800 p-6 rounded-lg w-full max-w-md">
        <h3 class="text-lg font-semibold mb-4 text-neutral-900 dark:text-white">Tambah Pasien</h3>
        <form action="{{ route('patients.store') }}" method="POST">@csrf
            <input type="text" name="full_name" placeholder="Nama Lengkap" class="w-full mb-3 p-2 border rounded" required>
            <input type="text" name="age" placeholder="Umur" class="w-full mb-3 p-2 border rounded" required>
            <input type="text" name="address" placeholder="Alamat" class="w-full mb-3 p-2 border rounded">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            <button type="button" onclick="closeModal('addPatientModal')" class="ml-2 text-gray-500">Batal</button>
        </form>
    </div>
</div>

<!-- MODAL TAMBAH ANTRAN -->
<div id="addQueueModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
    <div class="bg-white dark:bg-neutral-800 p-6 rounded-lg w-full max-w-md">
        <h3 class="text-lg font-semibold mb-4 text-neutral-900 dark:text-white">Tambah Antrian</h3>
        <form action="{{ route('queues.store') }}" method="POST">@csrf
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
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
            <button type="button" onclick="closeModal('addQueueModal')" class="ml-2 text-gray-500">Batal</button>
        </form>
    </div>
</div>

<!-- SCRIPT MODAL -->
<script>
function openModal(id) {
    document.getElementById(id).classList.remove('hidden');
}
function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
}
</script>
@endsection