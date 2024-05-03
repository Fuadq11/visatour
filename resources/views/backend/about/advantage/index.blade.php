@extends('backend.layout.layout')

@section('title', __('advantage'))

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
@endsection

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>{{ __('advantage') }}</h3>
                    </div>
                    <div class="col-6">
                        <a style="float: right" href="{{ route('admin.about.advantages.create') }}" class="btn btn-lg btn-success"><i
                                class="fas fa-plus-circle"></i></a>
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
                                <table class="display datatables" id="advantage">
                                    <thead>
                                    <tr>
                                        <th>{{ __('row') }}</th>
                                        <th>{{ __('icon') }}</th>
                                        <th>{{ __('title') }}</th>
                                        <th>{{ __('edit') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($advantages as $advantage)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><i style="font-size: 20px; color: royalblue" class="{{ $advantage->icon }}"></td>
                                            <td>{{ $advantage->content }}</td>
                                            <td>
                                                <a href="{{ route('admin.about.advantages.edit', $advantage) }}"
                                                   class="btn btn-primary btn-xs edit" type="button"><i
                                                        class="fas fa-edit"></i></a>
                                                <a href="{{ route('admin.about.advantages.destroy', $advantage) }}"
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
            $('#advantage').DataTable({
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
