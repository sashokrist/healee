@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                <h2 class="text-center">Hello {{ $patient->user->name }}, you are {{ $patient->age }} years old</h2>
                    <h3>Email {{ $patient->user->email }}</h3>
                    <h3>Phone +{{ $patient->phone }}</h3>
                    <h3>Gender {{ $patient->gender }}</h3>
                    <a href="{{ route('profile/edit') }}" class="btn btn-primary">Update</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
