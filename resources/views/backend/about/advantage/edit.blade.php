@extends('backend.layout.layout')

@section('title', __('advantage'))

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="margin-top: 30px">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h5>{{ __('advantage') }}</h5>
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
                        <div class="card-body add-advantage">
                            <form class="row" method="POST"
                                  action="{{ route('admin.about.advantages.update', $advantage) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <label>{{ __('icon') }}: *</label>
                                        <input type="text" name="icon" required
                                               class="form-control @error('icon') is-invalid @enderror"
                                               value="{{ old('content', $advantage->icon) }}"
                                               placeholder="{{ __('icon') }}">
                                        @error('icon')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label>{{ __('content') }}: *</label>
                                        <input type="text" name="content" required
                                               class="form-control @error('content') is-invalid @enderror"
                                               value="{{ old('content',$advantage->content) }}"
                                               placeholder="{{ __('content') }}">
                                        @error('content')
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