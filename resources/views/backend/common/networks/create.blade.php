@extends('backend.layout.layout')

@section('title',  __('network'))

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="margin-top: 30px">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h5>{{ __('network') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body add-network">
                            <form class="row" method="POST" action="{{ route('admin.networks.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <label>{{ __('name') }}: *</label>
                                        <input type="text" name="name"
                                               class="form-control @error('name') is-invalid @enderror" required
                                               value="{{ old('name') }}">
                                        @error('name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label>{{ __('icon') }}: *</label>
                                        <input type="text" name="icon"
                                               class="form-control @error('icon') is-invalid @enderror" required
                                               value="{{ old('icon') }}">
                                        @error('icon')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label>{{ __('url') }}: *</label>
                                        <input type="text" name="url"
                                               class="form-control @error('url') is-invalid @enderror" required
                                               value="{{ old('url') }}">
                                        @error('url')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="btn-showcase text-end mt-3">
                                    <button class="btn btn-outline-success" type="submit">{{ __('save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
