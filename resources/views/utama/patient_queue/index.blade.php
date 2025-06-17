@extends('layout.layout')
@php
    $title='Pation Queue';
    $subTitle = 'List';
    $script='<script src="' . asset('assets/js/data-table.js') . '"></script>';
@endphp

@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<div class="card border-0 overflow-hidden h-full">
    <div class="card-header flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white">Patient Queue List</h2>
        <div class="space-x-2">
            {{-- <button onclick="openModal('addPatientModal')" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Add Patient
            </button> --}}
            <button onclick="openModal('addQueueModal')" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Add Queue
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table border-0 mb-0">
                <thead>
                    <tr>
                        <th class="!rounded-s-none">No</th>
                        <th class="">Name</th>
                        <th class="">Age</th>
                        <th class="">Time In</th>
                        <th class="">Status</th>
                        <th class="">State</th>
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
                        <td class="px-6 py-4 text-sm capitalize ">
                            <span class="px-2 py-1 rounded text-xs
                                @if($queue->state == 'in_progress') !text-[#000000] bg-yellow-500 
                                @elseif($queue->state == 'completed') bg-green-600
                                @else bg-red-500 @endif">
                                {{ $queue->state }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-blue-600 dark:text-blue-400">
                            <a href="#">Lihat</a>
                        </td>
                      
                        <td class="px-6 py-4 text-sm">
                            <div class="flex space-x-2">
                                <form action="{{ route('change_state') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="queue_id" value="{{ $queue->id }}">
                                    <input type="hidden" name="state" value="in_progress">
                                    <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 text-xs rounded">
                                        Progress
                                    </button>
                                </form>
                        
                                <form action="{{ route('change_state') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="queue_id" value="{{ $queue->id }}">
                                    <input type="hidden" name="state" value="completed">
                                    <button class="bg-green-600 hover:bg-green-700 text-white px-2 py-1 text-xs rounded">
                                        Done
                                    </button>
                                </form>
                        
                                <form action="{{ route('change_state') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="queue_id" value="{{ $queue->id }}">
                                    <input type="hidden" name="state" value="canceled">
                                    <button class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 text-xs rounded" onclick="return confirm('Are you sure to cancel this queue?')">
                                        Cancel
                                    </button>
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
@section('modals')
    @include('components.add-patient-modal')
@endsection



