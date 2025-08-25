@extends('layouts.dashboard')

@section('title','طلبات الخدمات')

@section('content')
    <h2 class="mb-4">طلبات الخدمات</h2>
    <livewire:service-request-table />
@endsection