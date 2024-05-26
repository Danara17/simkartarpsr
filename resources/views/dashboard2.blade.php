@extends('layouts.template')

@section('content')
    <div class="p-4">
        <div class="shadow-sm bg-white px-3 py-5 rounded-md">
            <div class="font-medium text-base lg:text-xl">Selamat Pagi {{ auth()->user()->name }} !</div>
            <div class="text-xs lg:text-sm">Selamat Datang di SIM Kartar Permata Safira Regency</div>
        </div>
    </div>
@endsection
