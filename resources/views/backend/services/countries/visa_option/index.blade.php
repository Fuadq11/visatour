@extends('backend.layout.layout')

@section('title', __('visa_options'))

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
@endsection

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-9">
                        <h3>{{ __('visa_options') }} <span class="text-danger">({{ $country->name }})</span> <span
                                class="text-success">({{ $visa->name }})</span></h3>
                    </div>
                    <div class="col-3">
                        <a style="float: right" class="btn btn-lg btn-success"
                           href="{{ route('admin.service.countries.visa.options.create', [$country, $visa]) }}">
                            <i class="fas fa-plus-circle"></i>
                        </a>
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
                                        <th>{{ __('name') }}</th>
                                        <th>{{ __('visa_type') }}</th>
                                        <th>{{ __('edit') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($visaOptions as $visaOption)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $visaOption->name }}</td>
                                            <td>{{ $visaOption->visaType->name }}</td>
                                            <td class="">
                                                <a href="{{ route('admin.service.options.detail.edit', $visaOption) }}"
                                                   class="btn btn-air-warning btn-xs p-2 edit" type="button">
                                                    <i style="font-size: 20px" class="fas fa-info-circle"></i>
                                                </a>
                                                <a href="{{ route('admin.service.option.documents.index', $visaOption) }}"
                                                   class="btn btn-air-warning btn-xs p-2 edit" type="button">
                                                    <i style="font-size: 20px" class="fas fa-passport"></i>
                                                </a>
                                                <a href="{{ route('admin.service.countries.visa.options.edit', [$country, $visa, $visaOption]) }}"
                                                   class="btn btn-info btn-xs p-2 edit" type="button">
                                                    <i style="font-size: 20px" class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('admin.service.countries.visa.options.destroy', [$country, $visa, $visaOption]) }}"
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
