@extends('layout.layout')
@php
    $title='Triages List';
    $subTitle = 'List';
    $script='<script src="' . asset('assets/js/data-table.js') . '"></script>';
@endphp

@section('content')
<div class="card border-0 overflow-hidden h-full">
    <div class="card-header flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white">Triage List</h2>
        <button onclick='openTriageForm("create",@json($triages))' class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Add Triages
        </button>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table border-0 mb-0">
                <thead>
                    <tr>
                        <th class="!rounded-s-none">No</th>
                        <th>Name</th>
                        <th>Priority Score</th>
                        <th>Description</th>
                        <th class="!rounded-e-none">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($triages as $i => $triage)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $i + 1 }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">{{ $triage->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">{{ $triage->priority_score }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">{{ $triage->description }}</td>
                        <td class="px-6 py-4 text-sm">
                            <div class="flex space-x-2">
                                <button  onclick='openTriageForm("edit",@json($triage))' class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 text-xs rounded">
                                    Edit
                                </button>
                                <button  class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 text-xs rounded">
                                    Delete
                                </button>
                                
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-gray-500 dark:text-gray-300 py-4">Belum ada data triage</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('modals')
    @include('components.add-patient-modal')
@endsection
