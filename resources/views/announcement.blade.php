@extends('master')

@section('body')

{{-- <img class="w-full" src="{{ asset('announcements/' . $latest->filename) }}" alt=""> --}}

@if ($latest && $latest->filename)
    <img class="w-full" src="{{ asset('announcements/' . $latest->filename) }}" alt="Announcement">
@else
    <div class="w-full text-4xl md:text-7xl text-center p-10 md:pt-20 text-gray-700">
        No announcements available.
    </div>
@endif
    
@endsection