@extends('layouts.app')
@section('app')
    <div class="flex flex-row w-full min-h-screen bg-black">
        <!-- Sidebar -->
        @include('components.organisme.sidebar')
        
        <!-- Main Content -->
        @yield('content')

        <!-- Right Panel -->
        @include('components.organisme.panel')
    </div>
@endsection
