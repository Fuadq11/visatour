@extends('backend.layout.layout')

@section('title',  __('why_us'))

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="margin-top: 30px">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h5>{{ __('why_us') }}</h5>
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
                        <div class="card-body add-why_us">
                            <form class="row" method="POST" action="{{ route('admin.about.whyus.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
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
                                    <div class="col-sm-6 mb-3">
                                        <label>{{ __('title') }}: *</label>
                                        <input type="text" name="title"
                                               class="form-control @error('title') is-invalid @enderror" required
                                               value="{{ old('title') }}">
                                        @error('title')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label>{{ __('content') }}: *</label>
                                    <textarea name="content" class="tiny"
                                              rows="5">{{ old('content') }}</textarea>
                                    @error('content')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
