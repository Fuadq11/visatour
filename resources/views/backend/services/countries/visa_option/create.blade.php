@extends('backend.layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/css/choise.css') }}">
@endsection

@section('title', __('visa_options'))

@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="margin-top: 30px">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h3>{{ __('visa_options') }} <span class="text-danger">({{ $country->name }})</span>
                                        <span class="text-success">({{ $visa->name }})</span>
                                    </h3>
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
                        <div class="card-body add-visa_options">
                            <form class="row" method="POST"
                                  action="{{ route('admin.service.countries.visa.options.store', [$country, $visa]) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label>{{ __('feeTypes') }}:</label>
                                        <select name="fee_types[]" class="form-control"
                                                id="choices-multiple-remove-button" multiple>
                                            @foreach ($feeTypes as $feeType)
                                                <option value="{{ $feeType->id }}">{{ $feeType->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('fee_types')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3 mb-3">
                                        <label for="visa_type">{{ __('visa_type') }}: *</label>
                                        <select id="visa_type" class="form-select" name="visa_type_id" required
                                                @error('visa_type_id') is-invalid @enderror>
                                            @foreach ($visaTypes as $visaType)
                                                <option value="{{ $visaType->id }}">{{ $visaType->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('visa_type_id')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3 mb-3">
                                        <label>{{ __('name') }}: *</label>
                                        <input type="text" class="form-control" @error('name') is-invalid @enderror
                                        name="name" value="{{ old('name') }}" required>
                                        @error('name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2 mb-3">
                                        <label>{{ __('order_no') }}: *</label>
                                        <input type="number" class="form-control" @error('order_no') is-invalid
                                               @enderror
                                               name="order_no" value="{{ old('order_no') }}" required>
                                        @error('order_no')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <hr class="mt-4 text-success">
                                <h4 class="mt-4 mb-4 text-danger">Aşağıdakılardan yanlız BİRİ seçilə bilər</h4>

                                <div class="accordion dark-accordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="pricePanel">
                                            <button
                                                class="accordion-button collapsed gap-2 accordion-light-secondary active"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#priceCollapse"
                                                aria-expanded="false" aria-controls="priceCollapse">
                                                <i class="svg-wrapper" data-feather="dollar-sign"></i>{{ __('price') }}
                                                <i class="svg-color" data-feather="chevron-down"></i>
                                                @if ($errors->has('price') || $errors->has('visa_period') || $errors->has('stay_duration'))
                                                    <span class="text-danger">{{ __('error') }}</span>
                                                @endif
                                            </button>
                                        </h2>
                                        <div class="accordion-collapse collapse" id="priceCollapse"
                                             aria-labelledby="pricePanel">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    <div class="col-sm-3 mb-3">
                                                        <label for="visa_fee">{{ __('visa_fee') }}: *</label>
                                                        <input type="number" class="form-control" name="visa_fee"
                                                               value="{{ old('visa_fee') }}"
                                                               @error('visa_fee') is-invalid @enderror" >
                                                        @error('visa_fee')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-3 mb-3">
                                                        <label for="price">{{ __('service_fee') }}: *</label>
                                                        <input type="number" class="form-control" name="price"
                                                               value="{{ old('price') }}"
                                                               @error('price') is-invalid @enderror" >
                                                        @error('price')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-3 mb-3">
                                                        <label>{{ __('visa_period') }}: *</label>
                                                        <input type="text" class="form-control"
                                                               @error('visa_period') is-invalid @enderror
                                                               name="visa_period" value="{{ old('visa_period') }}">
                                                        @error('visa_period')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-3 mb-3">
                                                        <label>{{ __('stay_duration') }}: *</label>
                                                        <input type="text" class="form-control"
                                                               @error('stay_duration') is-invalid @enderror
                                                               name="stay_duration" value="{{ old('stay_duration') }}">
                                                        @error('stay_duration')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="infoPanel">
                                            <button
                                                class="accordion-button collapsed gap-2 accordion-light-secondary"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#infoCollapse"
                                                aria-expanded="false" aria-controls="infoCollapse">
                                                <i class="svg-wrapper"
                                                   data-feather="info"></i> {{ __('info_character') }} <i
                                                    class="svg-color" data-feather="chevron-down"></i>
                                                @if ($errors->has('additional_note') || $errors->has('general_info'))
                                                    <span class="text-danger">{{ __('error') }}</span>
                                                @endif
                                            </button>
                                        </h2>
                                        <div class="accordion-collapse collapse" id="infoCollapse"
                                             aria-labelledby="infoPanel">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    <div class="col-sm-6 mb-3">
                                                        <label>{{ __('general_info') }}: *</label>
                                                        <input type="text" class="form-control"
                                                               @error('general_info') is-invalid @enderror
                                                               name="general_info" value="{{ old('general_info') }}">
                                                        @error('general_info')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-6 mb-3">
                                                        <label>{{ __('additional_note') }}:</label>
                                                        <input type="text" class="form-control"
                                                               name="additional_note"
                                                               value="{{ old('additional_note') }}"
                                                               @error('additional_note') is-invalid @enderror" >
                                                        @error('additional_note')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
@section('js')
    <script src="{{ asset('backend/assets/js/choise.js') }}"></script>
    <script>
        $(document).ready(function () {
            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                removeItemButton: true,
            });
        });
    </script>
@endsection