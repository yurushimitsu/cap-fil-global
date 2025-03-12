@extends('master')

@section('body')

<div class="container">
    <form id="adminCreateForm" class="max-w-2xl mx-auto p-5" method="POST" data-action="{{ route('createAdminData') }}">
        @csrf
        <div class="text-center text-2xl font-bold pb-10">
            CREATE DATA
        </div>
        <div class="flex flex-wrap -mx-3 mb-3">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                Type
                </label>
                <div class="relative">
                    <select id="type" name="type" class="block appearance-none w-full bg-white border border-grey-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" required>
                        <option value="">Select Type</option>
                        <option value="fullyPaid">Fully Paid</option>
                        <option value="terminated">Terminated</option>
                    </select>
                </div>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                Batch Number
                </label>
                <input id="batchNo" name="batchNo" class="appearance-none block w-full bg-white text-gray-700 border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="1" required>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-3">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                Subscriber/Payee
                </label>
                <input id="subscriber" name="subscriber" class="appearance-none block w-full bg-white text-gray-700 border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Juan Dela Cruz" required>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                Account Number
                </label>
                <input id="accountNo" name="accountNo" class="appearance-none block w-full bg-white text-gray-700 border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="123456789" required>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-3">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                Amount
                </label>
                <input id="amount" name="amount" class="appearance-none block w-full bg-white text-gray-700 border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="1000.00" required>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                Schedule
                </label>
                <input id="schedule" name="schedule" class="appearance-none block w-full bg-white text-gray-700 border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="date" onfocus="disablePastDates()" required>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-3">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                Serving Office
                </label>
                <input id="office" name="office" class="appearance-none block w-full bg-white text-gray-700 border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Manila" required>
            </div>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
        </div>
    </form>
</div>


<script>
    document.getElementById('adminCreateForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const form = event.target;
        const formData = new FormData(form);

        fetch(form.getAttribute('data-action'), {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: data.message,
                    confirmButtonColor: '#B1D4E0',
                }).then(() => {
                    // form.reset();
                    window.location.href = '/admin/table';
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: data.message,
                });
            }
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            });
        });
    });

    function disablePastDates() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("schedule").setAttribute("min", today);
    }
</script>
@endsection