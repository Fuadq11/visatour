@extends('backend.layout.layout')

@section('title', __('partner'))

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="margin-top: 30px">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-12">
                                <h5>{{ __('partner') }}</h5>
                            </div>
                        </div>
                        <div class="card-body add-partner">
                            <form class="row" method="POST"
                                  action="{{ route('admin.about.partners.update', $partner) }}"
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
                                        <img src="{{ asset($partner->image) }}" style="width: 100px; height: 100px"
                                             alt="">
                                    </div>
                                    <img class="mb-3" src="" id="thumbnail" alt="">
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
    </script>
@endsection