@extends('layouts.app')
@section('content')
    <div class="mt-5 mx-auto max-w-7xl bg-white border border-gray-200 rounded-lg shadow-sm mx-auto">
        <div class="flex flex-col items-center p-10">
            <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $OrderDetail->title }}</h5>
            <p class="mb-1 text-xl font-medium text-gray-900">{!!  html_entity_decode($OrderDetail->description) !!}</p>
        </div>
    </div>
@endsection