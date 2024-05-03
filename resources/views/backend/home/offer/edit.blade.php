@extends('backend.layout.layout')

@section('title', __('offer'))

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="margin-top: 30px">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h5>{{ __('offer') }}</h5>
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
                        <div class="card-body add-offer">
                            <form class="row" method="POST" action="{{ route('admin.home.offers.update', $offer) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <label>{{ __('image') }}:</label>
                                        <input type="file" name="image" class="form-control" accept="image/*"
                                               value="{{ old('image') }}" onchange="ThumbnailUrl(this)">
                                        @error('image')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label>{{ __('current_image') }}:</label>
                                        <img src="{{ asset($offer->image) }}" style="width: 100px; height: 100px"
                                             alt="">
                                    </div>
                                    <img class="mb-3" src="" id="thumbnail" alt="">
                                </div>
                                <div class="row mb-5">
                                    <div class="col-sm-3">
                                        <label>{{ __('place') }}: *</label>
                                        <input type="text" name="place"
                                               class="form-control @error('place') is-invalid @enderror"
                                               value="{{ old('place', $offer->place) }}" required>
                                        @error('place')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label>{{ __('url') }}: *</label>
                                        <input type="text" name="url"
                                               class="form-control @error('url') is-invalid @enderror"
                                               value="{{ old('url', $offer->url) }}" required>
                                        @error('url')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2">
                                        <label>{{ __('direction') }}: *</label>
                                        <input type="number" name="direction" required
                                               class="form-control @error('direction') is-invalid @enderror"
                                               value="{{ old('direction', $offer->direction) }}">
                                        @error('direction')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2">
                                        <label>{{ __('transport') }}: *</label>
                                        <input type="number" name="transport" required
                                               class="form-control @error('transport') is-invalid @enderror"
                                               value="{{ old('transport', $offer->transport) }}">
                                        @error('transport')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2">
                                        <label>{{ __('nights') }}: *</label>
                                        <input type="number" name="nights" required
                                               class="form-control @error('nights') is-invalid @enderror"
                                               value="{{ old('nights', $offer->nights) }}">
                                        @error('nights')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-sm-3">
                                        <label>{{ __('package') }}: *</label>
                                        <input type="text" name="package"
                                               class="form-control @error('package') is-invalid @enderror"
                                               value="{{ old('package', $offer->package) }}" required>
                                        @error('package')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label>{{ __('price') }}: *</label>
                                        <input type="text" name="price" required
                                               class="form-control @error('price') is-invalid @enderror"
                                               value="{{ old('price', $offer->price) }}">
                                        @error('price')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label>{{ __('type') }}: *</label>
                                        <input type="text" name="type" required
                                               class="form-control @error('type') is-invalid @enderror"
                                               value="{{ old('type', $offer->type) }}">
                                        @error('type')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label>{{ __('order_no') }}: *</label>
                                        <input type="number" name="order_no" required
                                               class="form-control @error('order_no') is-invalid @enderror"
                                               value="{{ old('order_no', $offer->order_no) }}">
                                        @error('order_no')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="btn-showcase text-end">
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
    <script>
        function ThumbnailUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#thumbnail').attr('src', e.target.result).width(200).height(180);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection