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
                        <td class="px-2 py-4 text-gray-800 font-medium">{{ $row->batchNo }}</td>
                        <td class="px-6 py-4 text-gray-800 font-medium">{{ $row->subscriber }}</td>
                        <td class="px-6 py-4 text-gray-800 font-medium">{{ $row->accountNo }}</td>
                        <td class="px-6 py-4 text-gray-800 font-medium">{{ $row->amount }}</td>
                        <td class="px-6 py-4 text-gray-800 font-medium">{{ $row->schedule }}</td>
                        <td class="px-6 py-4 text-gray-800 font-medium">{{ $row->office }}</td>
                        <td class="px-6 py-4 text-gray-800 font-medium">
                            @if($row instanceof \App\Models\Fullypaid)
                                Fullypaid
                            @elseif($row instanceof \App\Models\Terminated)
                                Terminated
                            @endif
                        </td>
                        <td class="px-6 py-4 text-gray-800 font-medium">
                            <!-- Edit Button -->
                            <button 
                                id="openEditModal-{{ $row->trancheNo }}" 
                                type="button" 
                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-4 py-2.5 me-2 mb-2"
                                {{-- data-db="{{ $row instanceof \App\Models\Fullypaid ? 'fullypaid' : 'terminated' }}" --}}
                                data-batchno="{{ $row->batchNo }}"
                                data-subscriber="{{ $row->subscriber }}"
                                data-accountno="{{ $row->accountNo }}"
                                data-amount="{{ $row->amount }}"
                                data-schedule="{{ $row->schedule }}"
                                data-office="{{ $row->office }}"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>
                            </button>
            
                            <!-- Modal -->
                            <div 
                                id="crud-modal-{{ $row->trancheNo }}" 
                                tabindex="-1" 
                                aria-hidden="true" 
                                class="hidden fixed inset-0 z-50 flex items-center justify-center bg-opacity-50 transition-opacity duration-300"
                                {{-- data-db="{{ $row instanceof \App\Models\Fullypaid ? 'fullypaid' : 'terminated' }}" --}} >
                            
                                <div class="relative p-4 w-full max-w-xl max-h-full transform transition-all duration-200 scale-95 opacity-0">
                                    <!-- Modal content -->
                                    <div class="relative bg-white border border-gray-300 rounded-lg shadow-sm">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                                            <h3 class="text-lg font-semibold text-gray-900">
                                                Edit Data
                                            </h3>
                                            <button 
                                                id="closeEditModal-{{ $row->trancheNo }}" 
                                                type="button" 
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                            >
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <form class="p-4 md:p-5">
                                            <div class="grid gap-4 mb-4 grid-cols-2">
                                                <div class="col-span-1">
                                                    <label for="batchNo" class="block mb-2 text-sm text-start font-medium text-gray-900">Batch No.</label>
                                                    <input type="text" name="batchNo" id="batchNo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type batch number" required>
                                                </div>
                                                <div class="col-span-1">
                                                    <label for="subscriber" class="block mb-2 text-sm text-start font-medium text-gray-900">Subscriber/Payee</label>
                                                    <input type="text" name="subscriber" id="subscriber" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type subscriber/payee" required>
                                                </div>
                                                <div class="col-span-1">
                                                    <label for="accountNo" class="block mb-2 text-sm text-start font-medium text-gray-900">Account No.</label>
                                                    <input type="text" name="accountNo" id="accountNo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type account number" required>
                                                </div>
                                                <div class="col-span-1">
                                                    <label for="amount" class="block mb-2 text-sm text-start font-medium text-gray-900">Amount</label>
                                                    <input type="text" name="amount" id="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type amount" required>
                                                </div>
                                                <div class="col-span-1">
                                                    <label for="schedule" class="block mb-2 text-sm text-start font-medium text-gray-900">Schedule</label>
                                                    <input type="date" name="schedule" id="schedule" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                                                </div>
                                                <div class="col-span-1">
                                                    <label for="office" class="block mb-2 text-sm text-start font-medium text-gray-900">Servicing Office</label>
                                                    <input type="text" name="office" id="office" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type servicing office" required>
                                                </div>
                                            </div>
                                            <div class="flex justify-end gap-2">
                                                <button type="submit" class="text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                                    Cancel
                                                </button>
                                                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                                    Save changes
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
            
                            <!-- JavaScript to handle modal open/close -->
                            <script>
                                // Get modal and button elements for this row
                                const openEditModalButton{{ $row->trancheNo }} = document.getElementById('openEditModal-{{ $row->trancheNo }}');
                                const closeEditModalButton{{ $row->trancheNo }} = document.getElementById('closeEditModal-{{ $row->trancheNo }}');
                                const editModal{{ $row->trancheNo }} = document.getElementById('crud-modal-{{ $row->trancheNo }}');
                                const modalContent{{ $row->trancheNo }} = editModal{{ $row->trancheNo }}.querySelector('.relative');
            
                                // Get db attribute
                                const dbType{{ $row->trancheNo }} = openEditModalButton{{ $row->trancheNo }}.getAttribute('data-db');
            
                                // Open modal
                                openEditModalButton{{ $row->trancheNo }}.addEventListener('click', () => {
                                    console.log('Opening modal for', dbType{{ $row->trancheNo }}); // log db type for debugging
                                    // Get row data from the button data-* attributes
                                const batchNo = openEditModalButton{{ $row->trancheNo }}.getAttribute('data-batchno');
                                const subscriber = openEditModalButton{{ $row->trancheNo }}.getAttribute('data-subscriber');
                                const accountNo = openEditModalButton{{ $row->trancheNo }}.getAttribute('data-accountno');
                                const amount = openEditModalButton{{ $row->trancheNo }}.getAttribute('data-amount');
                                const schedule = openEditModalButton{{ $row->trancheNo }}.getAttribute('data-schedule');
                                const office = openEditModalButton{{ $row->trancheNo }}.getAttribute('data-office');
                                const db = openEditModalButton{{ $row->trancheNo }}.getAttribute('data-db');  // Get the database type (Fullypaid / Terminated)

                                // Populate the modal input fields with the row data
                                document.getElementById('batchNo').value = batchNo;
                                document.getElementById('subscriber').value = subscriber;
                                document.getElementById('accountNo').value = accountNo;
                                document.getElementById('amount').value = amount;
                                document.getElementById('schedule').value = schedule;
                                document.getElementById('office').value = office;
                                    editModal{{ $row->trancheNo }}.classList.remove('hidden');
                                    setTimeout(() => {
                                        editModal{{ $row->trancheNo }}.classList.remove('opacity-0');
                                        modalContent{{ $row->trancheNo }}.classList.remove('scale-95', 'opacity-0');
                                    }, 10);
                                });
            
                                // Close modal
                                closeEditModalButton{{ $row->trancheNo }}.addEventListener('click', () => {
                                    editModal{{ $row->trancheNo }}.classList.add('opacity-0');
                                    modalContent{{ $row->trancheNo }}.classList.add('scale-95', 'opacity-0');
                                    setTimeout(() => {
                                        editModal{{ $row->trancheNo }}.classList.add('hidden');
                                    }, 300);
                                });
            
                                // Close modal when clicking outside
                                window.addEventListener('click', (event) => {
                                    if (event.target === editModal{{ $row->trancheNo }}) {
                                        editModal{{ $row->trancheNo }}.classList.add('opacity-0');
                                        modalContent{{ $row->trancheNo }}.classList.add('scale-95', 'opacity-0');
                                        setTimeout(() => {
                                            editModal{{ $row->trancheNo }}.classList.add('hidden');
                                        }, 300);
                                    }
                                });
            
                                // Close modal on Escape key press
                                document.addEventListener('keydown', (event) => {
                                    if (event.key === 'Escape' && !editModal{{ $row->trancheNo }}.classList.contains('hidden')) {
                                        editModal{{ $row->trancheNo }}.classList.add('opacity-0');
                                        modalContent{{ $row->trancheNo }}.classList.add('scale-95', 'opacity-0');
                                        setTimeout(() => {
                                            editModal{{ $row->trancheNo }}.classList.add('hidden');
                                        }, 300);
                                    }
                                });
                            </script>
                        
                            <!-- Delete Button -->
                            <button type="button" class="text-gray-900 bg-red-700 hover:bg-red-800 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-4 py-2.5 me-2 mb-2">
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

@endsection