@extends('backend.layout.layout')

@section('title', __('contact'))

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="margin-top: 30px">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h5>{{ __('contact') }}</h5>
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
                        <div class="card-body add-contact">
                            <form class="row" method="POST" action="{{ route('admin.contact.update', 1) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
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
                                        <img src="{{ asset($contact->banner_image) }}" style="width: 300px; height: 100px"
                                             alt="">
                                    </div>
                                    <img class="mb-3" src="" id="thumbnailBanner" alt="">
                                </div>

                                <div class="row mb-5">
                                    <div class="col-sm-6">
                                        <label>{{ __('main_email') }} *:</label>
                                        <input type="text" name="main_email" required
                                               class="form-control @error('main_email') is-invalid @enderror"
                                               value="{{ old('main_email', $contact->main_email) }}">
                                        @error('main_email')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label>{{ __('email') }}:</label>
                                        <input type="text" name="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               value="{{ old('email', $contact->email) }}">
                                        @error('email')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-sm-3">
                                        <label>{{ __('phone') }} 1*:</label>
                                        <input type="text" name="phone1" required
                                               class="form-control @error('phone1') is-invalid @enderror"
                                               value="{{ old('phone1', $contact->phone1) }}">
                                        @error('phone1')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label>{{ __('phone') }} 2:</label>
                                        <input type="text" name="phone2"
                                               class="form-control @error('phone2') is-invalid @enderror"
                                               value="{{ old('phone2', $contact->phone2) }}">
                                        @error('phone2')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label>{{ __('phone') }} 3:</label>
                                        <input type="text" name="phone3"
                                               class="form-control @error('phone3') is-invalid @enderror"
                                               value="{{ old('phone3', $contact->phone3) }}">
                                        @error('phone3')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label>{{ __('phone') }} 4:</label>
                                        <input type="text" name="phone4"
                                               class="form-control @error('phone4') is-invalid @enderror"
                                               value="{{ old('phone4', $contact->phone4) }}">
                                        @error('phone4')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-sm-6">
                                        <label>{{ __('address') }}: *</label>
                                        <textarea name="address" required
                                                  class="form-control @error('address') is-invalid @enderror"
                                                  rows="5">{{ old('address', $contact->address) }}</textarea>
                                        @error('address')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label>{{ __('about') }}: *</label>
                                        <textarea name="about" required
                                                  class="form-control @error('about') is-invalid @enderror"
                                                  rows="5">{{ old('about', $contact->about) }}</textarea>
                                        @error('about')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-sm-6">
                                        <label>{{ __('map') }}: *</label>
                                        <textarea name="map" required
                                                  class="form-control @error('map') is-invalid @enderror"
                                                  rows="4">{{ old('map', $contact->map) }}</textarea>
                                        @error('map')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label>{{ __('work_hours') }}: *</label>
                                        <textarea name="work_hours" required
                                                  class="form-control @error('work_hours') is-invalid @enderror"
                                                  rows="4">{{ old('work_hours', $contact->work_hours) }}</textarea>
                                        @error('work_hours')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-sm-6">
                                        <label>Meta {{ __('title') }}: *</label>
                                        <textarea name="meta_title" required
                                                  class="form-control @error('meta_title') is-invalid @enderror"
                                                  rows="5">{{ old('meta_title', $contact->meta_title) }}</textarea>
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
                                                  rows="5">{{ old('meta_description', $contact->meta_description) }}</textarea>
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