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
                            <form class="row" method="POST" action="{{ route('admin.about.partners.store') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="col-sm-12 mb-3">
                                    <label>{{ __('image') }}: *</label>
                                    <input type="file" name="image" class="form-control" accept="image/*"
                                           value="{{ old('image') }}" onchange="ThumbnailUrl(this)">
                                    @error('image')
                                    <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <img class="mb-3" src="" id="thumbnail" alt="">
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