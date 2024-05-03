@extends('backend.layout.layout')

@section('title', __('slider'))

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="margin-top: 30px">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-12">
                                <h5>{{ __('slider') }}</h5>
                            </div>
                        </div>
                        <div class="card-body add-slider">
                            <form class="row" method="POST" action="{{ route('admin.home.sliders.store') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="col-sm-12 mb-3">
                                    <label>{{ __('image') }}: *</label>
                                    <input type="file" name="image" class="form-control" accept="image/*"
                                           value="{{ old('image') }}" onchange="ThumbnailUrl(this)" required>
                                    @error('image')
                                    <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <img class="mb-3" src="" id="thumbnail" alt="">
                                <div class="row mb-5">
                                    <div class="col-sm-6">
                                        <label>{{ __('title') }}: *</label>
                                        <textarea name="title"
                                                  class="tiny @error('title') is-invalid @enderror"
                                                  rows="5">{{ old('title') }}</textarea>
                                        @error('title')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label>{{ __('sub_title') }}:</label>
                                        <textarea name="sub_title"
                                                  class="tiny @error('sub_title') is-invalid @enderror"
                                                  rows="5">{{ old('sub_title') }}</textarea>
                                        @error('sub_title')
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