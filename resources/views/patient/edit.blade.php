@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile/update') }}">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="col-md-6">
                            Phone: +35<input id="name" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old($patient->phone) }}">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            DOB  <input  type="date" class="form-control" name="dob">

                        </div>
                        <div class="col-md-6">
                            Gender  <input  type="text" class="form-control" name="gender">

                        </div>
                        <div class="col-md-6">
                            Email notification  <input type="checkbox"  name="email_not" checked="">
                        </div>
                        <div class="col-md-6">
                            SMS notification  <input type="checkbox"  name="sms_not" checked="">
                        </div>
                </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
