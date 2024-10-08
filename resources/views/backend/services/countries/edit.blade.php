@extends('backend.layout.layout')

@section('title', __('country'))

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="margin-top: 30px">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h5>{{ __('country') }}</h5>
                                </div>
                                <div class="col-6">
                                    <ul class="d-flex justify-content-end">
                                        @foreach ($languages as $language)
                                            <li style="margin-right: 10px">
                                                <a class="btn btn-{{ app()->getLocale() == $language->code ? 'danger' : 'primary' }} btn-large"
                                                   href="{{ route('user.locale', $language->code) }}">
                                                    {{ $language->code }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body add-country">
                            <form class="row" method="POST"
                                  action="{{ route('admin.service.countries.update', $country) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-8 mb-3">
                                        <label>{{ __('name') }}: *</label>
                                        <input required type="text" class="form-control" name="name"
                                               @error('name') is-invalid @enderror"
                                        value="{{ old('name', $country->name) }}">
                                        @error('name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label>{{ __('code') }}: *</label>
                                        <input required type="text" class="form-control" name="code"
                                               @error('code') is-invalid @enderror"
                                        value="{{ old('code', $country->code) }}">
                                        @error('code')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="btn-showcase text-end">
                                    <button class="btn btn-outline-success" type="submit">{{ __('edit') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection