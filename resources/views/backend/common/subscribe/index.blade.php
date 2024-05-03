@extends('backend.layout.layout')

@section('title', __('subscribers'))

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
@endsection

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>{{ __('subscribers') }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <!-- Individual column searching (text inputs) Starts-->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display datatables" id="subscribe">
                                    <thead>
                                    <tr>
                                        <th>{{ __('row') }}</th>
                                        <th>{{ __('email') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($subscribes as $subscribe)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $subscribe->email }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Individual column searching (text inputs) Ends-->
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#subscribe').DataTable({
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
