@extends('backend.layout.layout')

@section('title', __('about'))

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="margin-top: 30px">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h5>{{ __('about') }}</h5>
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
                        <div class="card-body add-about">
                            <form class="row" method="POST" action="{{ route('admin.about.update', 1) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-5">
                                    <div class="col-sm-6">
                                        <label>{{ __('image') }}:</label>
                                        <input type="file" name="image" class="form-control" accept="image/*"
                                               value="{{ old('image') }}" onchange="ThumbnailUrl(this)">
                                        @error('image')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label>{{ __('current_image') }}:</label>
                                        <img src="{{ asset($about->image) }}" style="width: 100px; height: 100px"
                                             alt="">
                                    </div>
                                    <img class="mb-3" src="" id="thumbnail" alt="">
                                </div>

                                <div class="row mb-5">
                                    <div class="col-sm-6">
                                        <label>{{ __('banner_image') }}:</label>
                                        <input type="file" name="banner_image" class="form-control" accept="image/*"
                                               value="{{ old('banner_image') }}" onchange="ThumbnailBannerUrl(this)">
                                        @error('banner_image')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label>{{ __('current_banner_image') }}:</label>
                                        <img src="{{ asset($about->banner_image) }}" style="width: 100px; height: 100px"
                                             alt="">
                                    </div>
                                    <img class="mb-3" src="" id="thumbnailBanner" alt="">
                                </div>

                                <div class="row mb-5">
                                    <div class="col-sm-6">
                                        <label>{{ __('partner_title') }} *:</label>
                                        <input type="text" name="partner_title" required
                                               class="form-control @error('partner_title') is-invalid @enderror"
                                               value="{{ old('partner_title', $about->partner_title) }}">
                                        @error('partner_title')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label>{{ __('partner_subtitle') }}: *</label>
                                        <input type="text" name="partner_subtitle" required
                                               class="form-control @error('partner_subtitle') is-invalid @enderror"
                                               value="{{ old('partner_subtitle', $about->partner_subtitle) }}">
                                        @error('partner_subtitle')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-12 mb-5">
                                    <label>{{ __('content') }}: *</label>
                                    <textarea name="content" class="tiny @error('content') is-invalid @enderror"
                                              rows="5">{{ old('content', $about->content) }}</textarea>
                                    @error('content')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row mb-5">
                                    <div class="col-sm-6">
                                        <label>Meta {{ __('title') }}: *</label>
                                        <textarea name="meta_title" required
                                                  class="form-control @error('meta_title') is-invalid @enderror"
                                                  rows="5">{{ old('meta_title', $about->meta_title) }}</textarea>
                                        @error('meta_title')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Meta {{ __('description') }}: *</label>
                                        <textarea name="meta_description" required
                                                  class="form-control @error('meta_description') is-invalid @enderror"
                                                  rows="5">{{ old('meta_description', $about->meta_description) }}</textarea>
                                        @error('meta_description')
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
        function ThumbnailUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#thumbnail').attr('src', e.target.result).width(100).height(90);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

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