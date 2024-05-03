@extends('backend.layout.layout')

@section('title', __('countries'))

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
@endsection

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>{{ __('countries') }}</h3>
                    </div>
                    <div class="col-6">
                        <a style="float: right" href="{{ route('admin.service.countries.create') }}" class="btn btn-lg btn-success"><i
                                class="fas fa-plus-circle"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display datatables" id="country">
                                    <thead>
                                    <tr>
                                        <th>{{ __('row') }}</th>
                                        <th>{{ __('flag') }}</th>
                                        <th>{{ __('country') }}</th>
                                        <th>{{ __('edit') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($countries as $country)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="https://flagcdn.com/w40/{{$country->code}}.png" alt=""></td>
                                            <td>{{ $country->name }}</td>
                                            <td class="">
                                                <a href="{{ route('admin.service.countries.choose.visa', $country) }}"
                                                   class="btn btn-info btn-xs p-2" type="button">
                                                    <i style="font-size: 20px" class="fab fa-cc-visa"></i>
                                                </a>
                                                <a href="{{ route('admin.service.countries.edit', $country) }}"
                                                   class="btn btn-primary btn-xs edit p-2">
                                                    <i style="font-size: 20px" class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('admin.service.countries.destroy', $country) }}"
                                                   class="btn btn-danger btn-xs delete p-2">
                                                    <i style="font-size: 20px" class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#country').DataTable({
                language: {
                    @if (app()->getLocale() === 'az')
                    url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/az_az.json'
                    @elseif (app()->getLocale() === 'ru')
                    url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/ru.json'
                    @else
                    url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/en-gb.json'
                    @endif
                }
            });
        });
    </script>
@endsection
