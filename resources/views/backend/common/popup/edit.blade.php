@extends('backend.layout.layout')

@section('title', __('popup'))

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="margin-top: 30px">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h5>{{ __('popup') }}</h5>
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
                        <div class="card-body add-popup">
                            <form class="row" method="POST" action="{{ route('admin.popup.update', 1) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-5">
                                    <div class="col-sm-6">
                                        <label>{{ __('image') }}:</label>
                                        <input type="file" name="image" class="form-control" accept="image/*"
                                               value="{{ old('image') }}" onchange="ThumbnailBannerUrl(this)">
                                        @error('image')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label>{{ __('current_image') }}:</label>
                                        <img src="{{ asset($popup->image) }}" style="width: 300px; height: 100px">
                                    </div>
                                    <img class="mb-3" src="" id="thumbnailBanner" alt="">
                                </div>

                                <div class="col-sm-12 mb-5">
                                    <label>{{ __('title') }}: *</label>
                                    <textarea name="title"
                                              class="tiny @error('title') is-invalid @enderror"
                                              rows="5">{{ old('title', $popup->title) }}</textarea>
                                    @error('title')
                                    <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="row mb-5">
                                    <div class="col-sm-4">
                                        <label>{{ __('sub_title') }} *:</label>
                                        <input type="text" name="description" required
                                               class="form-control @error('description') is-invalid @enderror"
                                               value="{{ old('description', $popup->description) }}">
                                        @error('description')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label>{{ __('button_text') }} *:</label>
                                        <input type="text" name="button_text" required
                                               class="form-control @error('button_text') is-invalid @enderror"
                                               value="{{ old('button_text', $popup->button_text) }}">
                                        @error('button_text')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label>{{ __('button_link') }} *:</label>
                                        <input type="text" name="button_link" required
                                               class="form-control @error('button_link') is-invalid @enderror"
                                               value="{{ old('button_link', $popup->button_link) }}">
                                        @error('button_link')
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
@section('js')
    <script>
        function ThumbnailBannerUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#thumbnailBanner').attr('src', e.target.result).width(100).height(90);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection