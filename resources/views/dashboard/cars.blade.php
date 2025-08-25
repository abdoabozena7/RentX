@extends('layouts.dashboard')

@section('title','إدارة السيارات')

@section('content')
    <h2 class="mb-4">إدارة السيارات</h2>
    <livewire:car-table />
@endsection