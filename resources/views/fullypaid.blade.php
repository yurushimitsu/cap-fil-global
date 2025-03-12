@extends('master')

@section('body')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="container content-center">
    <div class="p-10">
        <h1 class="text-3xl font-medium text-center">FULLY PAID ACCOUNTS</h1>
    </div>
    <div class="pb-10">
        <form class="max-w-sm mx-auto" method="GET" action="{{ route('searchFullypaid') }}">   
            @csrf  
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" name="search" id="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Ex: 60663201A00198" />
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
            </div>
        </form>
    </div>
    <div class="relative overflow-x-auto px-10 md:px-30 table-data pb-10">
        @if(isset($search))
            @if($posts->isEmpty())
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 role="alert">
                    <span class="font-medium">Account number does not exist</span>
                </div>
            @else
                <table class="w-full text-sm text-center rtl:text-right text-gray-500 border-2">
                    <thead class="text-md text-gray-700" style="background-color: #B3E8E5">
                        <tr>
                            <th scope="col" class="px-6 py-3">Tranche No.</th>
                            <th scope="col" class="px-6 py-3">Batch No.</th>
                            <th scope="col" class="px-6 py-3">Subscriber/Payee</th>
                            <th scope="col" class="px-6 py-3">Account No.</th>
                            <th scope="col" class="px-6 py-3">Amount</th>
                            <th scope="col" class="px-6 py-3">Schedule</th>
                            <th scope="col" class="px-6 py-3">Servicing Office</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $row)
                            <tr class="bg-white border-b border-gray-200">
                                <td class="px-6 py-4 text-gray-800 font-medium">{{ $row->trancheNo }}</td>
                                <td class="px-6 py-4 text-gray-800 font-medium">{{ $row->batchNo }}</td>
                                <td class="px-6 py-4 text-gray-800 font-medium">{{ $row->subscriber }}</td>
                                <td class="px-6 py-4 text-gray-800 font-medium">{{ $row->accountNo }}</td>
                                <td class="px-6 py-4 text-gray-800 font-medium">{{ $row->amount }}</td>
                                <td class="px-6 py-4 text-gray-800 font-medium">{{ $row->schedule }}</td>
                                <td class="px-6 py-4 text-gray-800 font-medium">{{ $row->office }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        @endif
    </div>
</div>

{{-- <script>
    $(document).ready(function(){
        fetch_data();

        function fetch_data(query) {
            if (!query || query.trim() === "") {
                $('div.table-data').html("");
                return;
            }

            $.ajax({
                url:"{{ route('ajaxSearchFullypaid') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    $('div.table-data').html(data.table_data);
                }
            })
        }

        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_data(query);
        });
    });
</script> --}}

@endsection