@extends('master')

@section('body')

<div class="container content-center">
    <div class="p-10">
        <h1 class="text-3xl font-medium text-center">ALL DATA</h1>
    </div>
    <div class="relative overflow-x-auto px-20 table-data pb-10">
        <table class="w-full text-sm text-center rtl:text-right text-gray-500 border-2">
            <thead class="text-md text-gray-700" style="background-color: #B3E8E5">
                <tr>
                    {{-- <th scope="col" class="px-2 py-3">Tranche No.</th> --}}
                    <th scope="col" class="px-2 py-3">Batch No.</th>
                    <th scope="col" class="px-6 py-3">Subscriber/Payee</th>
                    <th scope="col" class="px-6 py-3">Account No.</th>
                    <th scope="col" class="px-6 py-3">Amount</th>
                    <th scope="col" class="px-6 py-3">Schedule</th>
                    <th scope="col" class="px-6 py-3">Servicing Office</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sortedData as $row)
                    <tr class="bg-white border-b border-gray-200">
                        {{-- <td class="px-2 py-4 text-gray-800 font-medium">{{ $row->trancheNo }}</td> --}}
                        <td class="px-2 py-4 text-gray-800 font-medium">{{ $row->batchNo }}</td>
                        <td class="px-6 py-4 text-gray-800 font-medium">{{ $row->subscriber }}</td>
                        <td class="px-6 py-4 text-gray-800 font-medium">{{ $row->accountNo }}</td>
                        <td class="px-6 py-4 text-gray-800 font-medium">{{ $row->amount }}</td>
                        <td class="px-6 py-4 text-gray-800 font-medium">{{ $row->schedule }}</td>
                        <td class="px-6 py-4 text-gray-800 font-medium">{{ $row->office }}</td>
                        <td class="px-6 py-4 text-gray-800 font-medium">
                                @php
                                    $db = '';
                                @endphp
                            @if($row instanceof \App\Models\Fullypaid)
                                Fullypaid
                                @php
                                    $db = 'fullypaid';
                                @endphp
                            @elseif($row instanceof \App\Models\Terminated)
                                Terminated
                                @php
                                    $db = 'terminated';
                                @endphp
                            @endif
                        </td>
                        <td class="px-6 py-4 text-gray-800 font-medium">
                            <!-- Edit Button -->
                            <button 
                                id="openEditModal" 
                                type="button" 
                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-4 py-2.5 me-2 mb-2"
                                data-db="{{ $db }}"
                                data-tranche-no="{{ $row->trancheNo }}"
                                data-batch-no="{{ $row->batchNo }}"
                                data-subscriber="{{ $row->subscriber }}"
                                data-account-no="{{ $row->accountNo }}"
                                data-amount="{{ $row->amount }}"
                                data-schedule="{{ $row->schedule }}"
                                data-office="{{ $row->office }}"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>
                            </button>
            
                            <!-- Delete Button -->
                            <button type="button" class="text-gray-900 bg-red-700 hover:bg-red-800 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-4 py-2.5 me-2 mb-2"
                            id="deleteRecordBtn" 
                            data-tranche-no="{{ $row->trancheNo }}" 
                            data-db="{{ $db }}"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-opacity-50 transition-opacity duration-300">
    <div class="mx-5 relative w-full max-w-3xl p-4 md:p-8 bg-white rounded-lg shadow-lg transform transition-all duration-300">
        <!-- Modal content -->
        <div class="relative">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">Edit Data</h3>
                <button id="closeEditModal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-full text-lg p-2">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form id="adminUpdate" method="POST" action="{{ route('updateAdminData') }}" class="p-4 space-y-6">
                @csrf
                <div class="grid gap-4 grid-cols-2">
                    <input type="hidden" id="dbTable" name="dbTable" value="">
                    <input type="hidden" id="trancheNo" name="trancheNo" value="">
                    <div>
                        <label for="batchNo" class="block mb-2 text-sm font-medium text-gray-900">Batch No.</label>
                        <input type="text" name="batchNo" id="batchNo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 focus:ring-primary-600 focus:border-primary-600" required>
                    </div>
                    <div>
                        <label for="subscriber" class="block mb-2 text-sm font-medium text-gray-900">Subscriber/Payee</label>
                        <input type="text" name="subscriber" id="subscriber" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 focus:ring-primary-600 focus:border-primary-600" required>
                    </div>
                    <div>
                        <label for="accountNo" class="block mb-2 text-sm font-medium text-gray-900">Account No.</label>
                        <input type="text" name="accountNo" id="accountNo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 focus:ring-primary-600 focus:border-primary-600" required>
                    </div>
                    <div>
                        <label for="amount" class="block mb-2 text-sm font-medium text-gray-900">Amount</label>
                        <input type="text" name="amount" id="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 focus:ring-primary-600 focus:border-primary-600" required>
                    </div>
                    <div>
                        <label for="schedule" class="block mb-2 text-sm font-medium text-gray-900">Schedule</label>
                        <input type="date" name="schedule" id="schedule" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 focus:ring-primary-600 focus:border-primary-600" required>
                    </div>
                    <div>
                        <label for="office" class="block mb-2 text-sm font-medium text-gray-900">Servicing Office</label>
                        <input type="text" name="office" id="office" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 focus:ring-primary-600 focus:border-primary-600" required>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="flex justify-end gap-2">
                    <button type="button" id="cancelEdit" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Cancel</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // JavaScript to handle the modal opening and populating data
    document.addEventListener('DOMContentLoaded', function () {
        // Get all the Edit buttons
        const editButtons = document.querySelectorAll('#openEditModal');
        const deleteButtons = document.querySelectorAll('#deleteRecordBtn');

        // Add event listeners to each Edit button
        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                // Get data attributes from the clicked button
                const dbTable = button.getAttribute('data-db');
                const trancheNo = button.getAttribute('data-tranche-no');
                const batchNo = button.getAttribute('data-batch-no');
                const subscriber = button.getAttribute('data-subscriber');
                const accountNo = button.getAttribute('data-account-no');
                const amount = button.getAttribute('data-amount');
                const schedule = button.getAttribute('data-schedule');
                const office = button.getAttribute('data-office');

                // Populate the modal's input fields with the data
                document.getElementById('dbTable').value = dbTable;
                document.getElementById('trancheNo').value = trancheNo;
                document.getElementById('batchNo').value = batchNo;
                document.getElementById('subscriber').value = subscriber;
                document.getElementById('accountNo').value = accountNo;
                document.getElementById('amount').value = amount;
                document.getElementById('schedule').value = schedule;
                document.getElementById('office').value = office;

                // Show the modal
                document.getElementById('crud-modal').classList.remove('hidden');
            });
        });

        // Close the modal when clicking the close button
        document.getElementById('closeEditModal').addEventListener('click', function () {
            document.getElementById('crud-modal').classList.add('hidden');
        });

        // Close the modal when clicking the close button
        document.getElementById('cancelEdit').addEventListener('click', function () {
            document.getElementById('crud-modal').classList.add('hidden');
        });

        // Handle the form submission
        document.querySelector('form').addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent the form from submitting normally

            const dbTable = document.getElementById('dbTable').value;
            const trancheNo = document.getElementById('trancheNo').value;
            const batchNo = document.getElementById('batchNo').value;
            const subscriber = document.getElementById('subscriber').value;
            const accountNo = document.getElementById('accountNo').value;
            const amount = document.getElementById('amount').value;
            const schedule = document.getElementById('schedule').value;
            const office = document.getElementById('office').value;

            // Send the data to the backend using Fetch API (or you can use axios)
            fetch('/admin/update', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token for Laravel
                },
                body: JSON.stringify({
                    dbTable,
                    trancheNo,
                    batchNo,
                    subscriber,
                    accountNo,
                    amount,
                    schedule,
                    office
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Display SweetAlert for success
                    Swal.fire({
                        icon: 'success',
                        title: 'Record updated successfully',
                        showConfirmButton: false,
                        timer: 1500 // Auto-close after 1.5 seconds
                    }).then(() => {
                        location.reload(); // Optionally reload the page to reflect changes
                    });
                } else {
                    // Display SweetAlert for error
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Error updating record. Please try again.',
                        showConfirmButton: true
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Display SweetAlert for a catch error
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error: ' + error.message,
                    showConfirmButton: true
                });
            });

            // Close the modal
            document.getElementById('crud-modal').classList.add('hidden');
        });


        // Add event listeners to each Delete button
        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                // Get data attributes from the clicked button
                const dbTable = button.getAttribute('data-db');
                const trancheNo = button.getAttribute('data-tranche-no');

                // Confirm before deleting
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action cannot be undone.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Send the DELETE request
                        fetch(`/admin/delete/${dbTable}/${trancheNo}`, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}', // CSRF token for Laravel
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Show success message
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'The record has been deleted.',
                                    showConfirmButton: false,
                                    timer: 1500,
                                }).then(() => {
                                    location.reload(); // Optionally reload the page to reflect changes
                                });
                            } else {
                                // Show error message
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'There was an error deleting the record.',
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Error: ' + error.message,
                            });
                        });
                    }
                });
            });
        });
    });

    
</script>

@endsection