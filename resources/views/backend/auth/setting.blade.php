@extends('backend.layout.layout')
@section('content')
    @section('title')
        {{ __('settings') }}
    @endsection
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="margin-top: 30px">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ __('edit') }}</h5>
                        </div>
                        <div class="card-body add-post">
                            <form class="row" method="POST"
                                  action="{{ route('admin.change_settings', auth()->user()) }}">
                                @csrf
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label>{{ __('fullname') }}:</label>
                                        <input class="form-control" type="text" name="firstname" required
                                               value="{{ auth()->user()->name }}">
                                        @error('firstname')
                                        <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>{{ __('email') }}:</label>
                                        <input class="form-control" type="text" name="email" required
                                               value="{{ auth()->user()->email }}">
                                        @error('email')
                                        <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>{{ __('password') }}:</label>
                                        <input class="form-control" type="text" name="password">
                                        @error('password')
                                        <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>{{ __('password_confirm') }}:</label>
                                        <input class="form-control" type="text" name="password_confirm">
                                        @error('password_confirm')
                                        <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="btn-showcase text-end">
                                    <button class="btn btn-primary" type="submit">{{ __('edit') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
