@extends('backend.layout.layout')

@section('title', __('visa'))

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
@endsection

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>{{ __('visa') }}</h3>
                    </div>
                    <div class="col-6">
                        <a style="float: right" href="{{ route('admin.service.visas.create') }}"
                           class="btn btn-lg btn-success"><i
                                class="fas fa-plus-circle"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display datatables" id="visa">
                                    <thead>
                                    <tr>
                                        <th>{{ __('row') }}</th>
                                        <th>{{ __('icon') }}</th>
                                        <th>{{ __('name') }}</th>
                                        <th>{{ __('edit') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($visas as $visa)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><i style="color: blue; font-size:40px" class="{{ $visa->icon }}"></i></td>
                                            <td>{{ $visa->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.service.visas.edit', $visa) }}"
                                                   class="btn btn-primary btn-xs edit" type="button"><i
                                                        class="fas fa-edit"></i></a>
                                                <a href="{{ route('admin.service.visas.destroy', $visa) }}"
                                                   class="btn btn-danger btn-xs delete"><i
                                                        class="fas fa-trash-alt"></i></a>
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
            $('#visa').DataTable({
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
