<div id="addPatientModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
    <div class="dark:bg-neutral-800 bg-neutral-100 dark:text-white p-6 rounded-lg max-w-4xl mx-auto">
        <h3 class="text-lg font-semibold mb-4 text-neutral-900 dark:text-white">Add New Patient</h3>
        <form>@csrf
            
            <div class="mt-4 flex justify-end gap-2">
                <button type="button" onclick="openModal('addQueueModal')" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Next</button>
                <button type="button" onclick="closeModal('addPatientModal')" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Cancel</button>
            </div>
        </form>
    </div>
</div>
<div id="addQueueModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
    <div class="dark:bg-neutral-800 bg-neutral-100 dark:text-white p-6 rounded-lg max-w-4xl mx-auto">
        <h3 class="text-lg font-semibold mb-4 text-neutral-900 dark:text-white">Add New Queuue</h3>
        <form action="{{ route('add_queue') }}" method="POST" id="multiStepForm">
            @csrf
        
            <!-- Step 1: Patient -->
            <div id="step1">
                <h3 class="text-lg font-semibold mb-4 text-neutral-900 dark:text-white">Patient Data</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm mb-1">Full Name</label>
                        <input type="text" name="full_name" placeholder="Enter full name" class="form-control" required>
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Age</label>
                        <input type="text" name="age" placeholder="Enter age" class="form-control"" required>
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Gender</label>
                        <select name="gender" class="form-control"" required>
                            <option value="">Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Place & Date of Birth</label>
                        <input type="text" name="podb" placeholder="City, dd-mm-yyyy" class="form-control"">
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Occupation</label>
                        <input type="text" name="occupation" placeholder="Enter occupation" class="form-control"">
                    </div>
                    <div>
                        <label class="block text-sm mb-1">NIK (ID Number)</label>
                        <input type="text" name="nik" placeholder="Enter NIK" class="form-control"">
                    </div>
                    <div class="md:col-span-3">
                        <label class="block text-sm mb-1">Address</label>
                        <textarea name="address" class="form-control" rows="2"></textarea>
                    </div>
                </div>
                <button type="button" onclick="nextStep()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Next</button>
                <button type="button" onclick="closeModal('addQueueModal')" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Cancel</button>
            </div>
        
            <!-- Step 2: Queue -->
            <div id="step2" class="hidden">
                <h3 class="text-lg font-semibold mb-4 text-neutral-900 dark:text-white">Patient Data</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                    <div>
                        <label class="block text-sm mb-1">Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Time</label>
                        <input type="time" name="time" class="form-control" required>
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Triage</label>
                        <select name="triage" id="triage" class="form-control" onchange="updateStatus(this)" required>
                            @foreach($triages as $triage)
                                <option value="{{ $triage->id }}" data-priority="{{ $triage->priority_score }}" data-name="{{ $triage->name }}">
                                    {{ $triage->name }} - {{ $triage->description }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Status</label>
                        <input type="text" name="status" id="status" class="form-control" readonly>
                    </div>
                </div>
                <button type="submit"  class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Submit</button>
                <button type="button" onclick="backStepp()" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">back</button>
    
            </div>
        </form>
    </div>
</div>
<div id="viewPatientModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
    <div class="dark:bg-neutral-800 bg-neutral-100 dark:text-white p-6 rounded-lg max-w-3xl mx-auto w-full">
        <h3 class="text-lg font-semibold mb-4 text-neutral-900 dark:text-white">Patient Details</h3>
        
        <div class="space-y-2">
            <div><strong>Full Name:</strong> <span id="viewPatientName">-</span></div>
            <div><strong>Age:</strong> <span id="viewPatientAge">-</span></div>
            <div><strong>Gender:</strong> <span id="viewPatientGender">-</span></div>
            <div><strong>NIK:</strong> <span id="viewPatientNIK">-</span></div>
            <div><strong>Address:</strong> <span id="viewPatientAddress">-</span></div>
        </div>

        <div class="mt-6 flex justify-end">
            <button type="button" onclick="closeModal('viewPatientModal')" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Close</button>
        </div>
    </div>
</div>


<script>
    function openModal(id) {
        console.log(id);

        if (id == "addQueueModal" ) {
            console.log(true);
            
            document.getElementById("addPatientModal").classList.add('hidden');
        }
        document.getElementById(id).classList.remove('hidden');
    }
    function closeModal(id) {
       
        document.getElementById(id).classList.add('hidden');
    }
    function updateStatus(selectEl) {
        if (!selectEl) return;

        const selectedOption = selectEl.options[selectEl.selectedIndex];
        const priorityScore = parseInt(selectedOption.getAttribute('data-priority'));

        let status = '';
        if (priorityScore >= 80) {
            status = 'red';
        } else if (priorityScore >= 50) {
            status = 'yellow';
        } else {
            status = 'green';
        }

        document.getElementById('status').value = status;
    }
    function nextStep() {
        document.getElementById('step1').classList.add('hidden');
        document.getElementById('step2').classList.remove('hidden');
    }
    function backStepp() {
        document.getElementById('step2').classList.add('hidden');
        document.getElementById('step1').classList.remove('hidden');
    }
    function showPatientDetail(patient) {
        console.log("ke click");
        
        document.getElementById("viewPatientName").innerText = patient.full_name || '-';
        document.getElementById("viewPatientAge").innerText = patient.age || '-';
        document.getElementById("viewPatientGender").innerText = patient.gender || '-';
        document.getElementById("viewPatientNIK").innerText = patient.nik || '-';
        document.getElementById("viewPatientAddress").innerText = patient.address || '-';

        document.getElementById("viewPatientModal").classList.remove('hidden');
    }
    </script>