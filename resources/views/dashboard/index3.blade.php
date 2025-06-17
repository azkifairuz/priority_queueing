@extends('layout.layout')

@php
    $title='Home';
    $subTitle = '';
    $script= '<script src="' . asset('assets/js/homeOneChart.js') . '"></script>';
@endphp

@section('content')
<div class="px-4 py-6">
    <!-- Nomor Antrian Saat Ini -->
    <div class="mb-6">
        <div class="bg-blue-100 text-blue-800 font-semibold rounded-lg p-6 shadow">
            <h2 class="text-xl">Nomor Antrian Saat Ini</h2>
            <p class="text-4xl mt-2">{{ $currentQueueNumber ?? 'Belum Ada' }}</p>
        </div>
    </div>

    <!-- Card Info -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Antrian On Progress -->
        <div class="bg-white dark:bg-neutral-700 p-5 rounded-lg shadow border border-gray-200 dark:border-neutral-600">
            <p class="text-neutral-900 dark:text-white font-semibold">Antrian On Progress</p>
            <p class="text-3xl mt-2 text-blue-600 font-bold">{{ $onProgressCount }}</p>
        </div>

        <!-- Pasien Baru Hari Ini -->
        <div class="bg-white dark:bg-neutral-700 p-5 rounded-lg shadow border border-gray-200 dark:border-neutral-600">
            <p class="text-neutral-900 dark:text-white font-semibold">Pasien Baru Hari Ini</p>
            <p class="text-3xl mt-2 text-green-600 font-bold">{{ $newPatientCount }}</p>
        </div>

        <!-- Total Antrian Hari Ini -->
        <div class="bg-white dark:bg-neutral-700 p-5 rounded-lg shadow border border-gray-200 dark:border-neutral-600">
            <p class="text-neutral-900 dark:text-white font-semibold">Total Antrian Hari Ini</p>
            <p class="text-3xl mt-2 text-purple-600 font-bold">{{ $todayQueueCount }}</p>
        </div>
    </div>

    <!-- History Pasien Terakhir -->
    <div class="bg-white dark:bg-neutral-700 p-6 rounded-lg shadow border border-gray-200 dark:border-neutral-600">
        <h3 class="text-lg font-semibold text-neutral-900 dark:text-white mb-4">Riwayat Antrian Terakhir</h3>
        <ul class="space-y-3">
            @forelse ($latestQueues as $queue)
                <li class="flex justify-between border-b border-gray-200 pb-2">
                    <div>
                        <p class="font-medium dark:text-white">{{ $queue->patient->full_name }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            Triage: {{ $queue->triage->name }} | Status: <span class="capitalize">{{ $queue->status }}</span>
                        </p>
                    </div>
                    <div class="text-right text-sm text-gray-500 dark:text-gray-300">
                        {{ \Carbon\Carbon::parse($queue->time)->format('H:i') }}
                    </div>
                </li>
            @empty
                <li class="text-gray-600 dark:text-gray-300">Belum ada data antrian.</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection