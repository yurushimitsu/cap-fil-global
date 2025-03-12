@extends('master')

@section('body')

<div class="container">
    <form id="adminCreateAnnouncement" class="max-w-2xl mx-auto md:pt-10 p-5" method="POST" data-action="{{ route('uploadAnnouncement') }}" enctype="multipart/form-data">
        @csrf
        <div class="text-center text-2xl font-bold pb-10">
            CREATE ANNOUNCEMENT
        </div>
        <div class="flex flex-wrap -mx-3 mb-3">
            <div class="w-full  px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Announcement Image
                </label>
                <input type="file" name="image" id="image" class="appearance-none block w-full bg-white text-gray-700 border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" accept="image/*" required>
            </div>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
        </div>
    </form>
</div>

<div class="container content-center">
    <div class="px-10 py-5">
        <h1 class="text-3xl font-medium text-center">ALL ANNOUNCEMENTS</h1>
    </div>
    <div class="relative overflow-x-auto px-5 md:px-50 table-data pb-10">
        <table class="w-full text-sm text-center rtl:text-right text-gray-500 border-2">
            <thead class="text-md text-gray-700" style="background-color: #B3E8E5">
                <tr>
                    {{-- <th scope="col" class="px-2 py-3">Tranche No.</th> --}}
                    <th scope="col" class="px-2 py-3">Filename</th>
                    <th scope="col" class="px-2 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($announcements->isEmpty())
                    <tr class="bg-white border-b border-gray-200">
                        <td colspan="2" class="px-2 py-4 text-center text-gray-700 font-medium">
                            No announcements available.
                        </td>
                    </tr>
                @else
                    @foreach($announcements as $row)
                        <tr class="bg-white border-b border-gray-200">
                            {{-- <td class="px-2 py-4 text-gray-800 font-medium">{{ $row->trancheNo }}</td> --}}
                            <td class="px-2 py-4 text-blue-600 hover:text-blue-800 font-medium underline"><a href="{{ asset('announcements/'.$row->filename) }}" target="_blank">{{ $row->filename }}</a></td>
                            
                            <td class="px-6 py-4 text-gray-800 font-medium">           
                                <!-- Delete Button -->
                                <button type="button" class="text-gray-900 bg-red-700 hover:bg-red-800 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-4 py-2.5 me-2 mb-2"
                                id="deleteRecordBtn" 
                                data-filename="{{ $row->filename }}" 
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

<script>
    document.getElementById('adminCreateAnnouncement').addEventListener('submit', function(event) {
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
                    form.reset();
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
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('#deleteRecordBtn');

        // Add event listeners to each Delete button
        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                // Get data attributes from the clicked button
                const filename = button.getAttribute('data-filename');

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
                        fetch(`/admin/announcement/delete/${filename}`, {
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