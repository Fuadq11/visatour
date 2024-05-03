@extends('backend.layout.layout')

@section('title',  __('contact_us'))

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="margin-top: 30px">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h5>{{ __('contact_us') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body add-contact_us">
                            <div class="row">
                                <div class="col-sm-4 mb-3">
                                    <label>{{ __('name') }}:</label>
                                    <input type="text" name="name" class="form-control" readonly
                                           value="{{ old('name', $contactUs->name) }}">
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <label>{{ __('email') }}:</label>
                                    <input type="text" class="form-control" readonly
                                           value="{{ old('icon', $contactUs->email) }}">
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <label>{{ __('phone') }}:</label>
                                    <input type="text" class="form-control" readonly
                                           value="{{ old('url', $contactUs->subject) }}">
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label>{{ __('subject') }}:</label>
                                    <textarea class="form-control" readonly>{{ $contactUs->message }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
