<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientQueue;
use App\Models\Patient;
use App\Models\Triages;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{

    public function index()
    {
        $currentQueue = PatientQueue::whereDate('patient_queues.date', today())
            ->join('triages', 'patient_queues.triage_id', '=', 'triages.id')
            ->orderByDesc('triages.priority_score') 
            ->orderBy('patient_queues.time') 
            ->where('patient_queues.state','!=','completed') 
            ->select('patient_queues.*') 
            ->first();
       
        return view('dashboard/index', [
            'currentQueueNumber' => $currentQueue?->queue,
            'onProgressCount' => PatientQueue::where('state', 'on_progress')->count(),
            'newPatientCount' => Patient::whereDate('created_at', today())->count(),
            'todayQueueCount' => PatientQueue::whereDate('date', today())->count(),
            'latestQueues' => PatientQueue::with(['patient', 'triage'])->latest('time')->limit(5)->get(),
        ]);

    }

    public function index2()
    {
        $queues = PatientQueue::whereDate('patient_queues.date', today())
                                ->join('triages', 'patient_queues.triage_id', '=', 'triages.id')
                                ->orderByDesc('triages.priority_score')
                                ->orderBy('patient_queues.time')
                                ->select('patient_queues.*')
                                ->get()
                                ->load(['patient', 'triage']);
        return view('utama/patient_queue/index', [
            'queues' => $queues,
            'patients' => Patient::all(),
            'triages' => Triages::all(),
        ]);
    }

    public function store(Request $request)
    {
        Log::info('🔍 Store method called', ['request_data' => $request->all()]);
        $request->validate([
            // Validasi data pasien
            'full_name' => 'required|string|max:255',
            'age' => 'required|string|max:10',
            'gender' => 'required|in:male,female',
            'podb' => 'required|string',
            'occupation' => 'required|string',
            'nik' => 'required|string',
            'address' => 'required|string',
    
            // Validasi data queue
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'triage' => 'required|exists:triages,id',
            'status' => 'required|in:red,yellow,green',
        ]);
        Log::info('✅ Validation passed');
        try {
            // Simpan data pasien

             $patient = Patient::where('nik', $request->nik)->first();

            if (!$patient) {
                // Jika belum ada, buat data pasien baru
                $patient = Patient::create([
                    'full_name' => $request->full_name,
                    'age' => $request->age,
                    'gender' => $request->gender,
                    'podb' => $request->podb,
                    'occupation' => $request->occupation,
                    'nik' => $request->nik,
                    'address' => $request->address,
                ]);
                Log::info('✅ Patient created', ['patient_id' => $patient->id]);
            } else {
                Log::info('ℹ️ Patient already exists', ['patient_id' => $patient->id]);
            }
            Log::info('✅ Patient created', ['patient_id' => $patient->id]);
            // Gabungkan date & time menjadi timestamp
            $datetime = $request->date . ' ' . $request->time . ':00';

            // Hitung antrean untuk tanggal yang sama
            $todayQueueCount = PatientQueue::whereDate('date', $request->date)->count();
            $queueNumber = $todayQueueCount + 1;

            // Simpan data antrean
            $queue = PatientQueue::create([
                'date' => $request->date,
                'time' => $datetime,
                'triage_id' => $request->triage,
                'patient_id' => $patient->id,
                'status' => $request->status,
                'state' => 'waiting',
                'queue' => $queueNumber, // 👈 tambahkan ini
            ]);
            Log::info('✅ Queue created', ['queue_id' => $queue->id]);
            return redirect()->back()->with('success', 'Patient & queue registered successfully.');
        }catch (\Exception $e) {
            Log::error('❌ Error while storing patient or queue', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
    
    public function updateQueueState(Request $request)
    {
        $request->validate([
            'queue_id' => 'required|exists:patient_queues,id',
            'state' => 'required|in:waiting,in_progress,completed,canceled',
        ]);

        try {
            $queue = PatientQueue::findOrFail($request->queue_id);
            $oldState = $queue->state;
            $queue->state = $request->state;
            $queue->save();

            return redirect()->back()->with('success', "State updated from '$oldState' to '$queue->state'.");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update state: ' . $e->getMessage());
        }
    }
    public function index4()
    {
        return view('dashboard/index4');
    }

    public function index5()
    {
        return view('dashboard/index5');
    }

    public function index6()
    {
        return view('dashboard/index6');
    }

    public function index7()
    {
        return view('dashboard/index7');
    }

    public function index8()
    {
        return view('dashboard/index8');
    }

    public function index9()
    {
        return view('dashboard/index9');
    }

}
