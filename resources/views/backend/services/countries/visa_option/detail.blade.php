@extends('backend.layout.layout')

@section('title', __('details'))

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="margin-top: 30px">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-9">
                                    <h3>{{ __('details') }} <span class="text-danger">({{ $visaOption->name }})</span>
                                    </h3>
                                </div>
                                <div class="col-3">
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
                        <div class="card-body add-detail">
                            <form class="row" method="POST"
                                  action="{{ route('admin.service.options.detail.update', [$visaOption, $visaOptionDetail]) }}">
                                @csrf
                                <div class="col-sm-12 mb-3">
                                    <label>{{ __('details') }}:</label>
                                    <textarea class="form-control" name="details" rows="5" required
                                              placeholder="{{ __('details') }}">{{ $visaOptionDetail?->details }}</textarea>
                                    @error('details')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="btn-showcase text-end mt-4">
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