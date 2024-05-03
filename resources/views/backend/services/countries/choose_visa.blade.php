@extends('backend.layout.layout')

@section('title', __('visas'))

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
@endsection

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3 class="text-info">{{ __('pls_choose_visas') }}</h3>
                        <h3 class="text-danger">({{ $country->name }})</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-5">
            <form class="form" action="{{ route('admin.service.countries.store.visa', $country) }}" method="post">
                @csrf
                <div class="row">
                    @foreach ($visas as $visa)
                        <div class="col-sm-3">
                            <i style="color: blue; font-size:30px; margin-right: 3px" class="{{ $visa->icon }}"></i>
                            <label for="visa-{{$visa->id}}"
                                   style="font-size: 20px; margin-right: 5px">{{ $visa->name }}</label>
                            <input id="visa-{{$visa->id}}" type="checkbox" name="visas[]" value="{{ $visa->id }}"
                                   {{ in_array($visa->id, $country->visas->pluck('id')->toArray()) ? 'checked' : ''}}
                                   style="width: 25px; height: 25px">
                        </div>
                    @endforeach
                </div>
                <div class="btn-showcase text-end mt-4">
                    <button class="btn btn-outline-success" type="submit">{{ __('save') }}</button>
                </div>
            </form>
        </div>

        @if($country->visas->count() > 0)
            <hr>

            <div class="container-fluid">
                <div class="page-title">
                    <h3 class="text-success">{{ __('add_visa_options') }}</h3>
                </div>
            </div>

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
                                            <th>{{ __('visa') }}</th>
                                            <th>{{ __('edit') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($country->visas as $visa)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <i style="color: blue; font-size:30px; margin-right: 3px"
                                                       class="{{ $visa->icon }}"></i>
                                                    <label for="visa-{{$visa->id}}"
                                                           style="font-size: 20px; margin-right: 5px">{{ $visa->name }}</label>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.service.countries.visa.options', [$country, $visa]) }}"
                                                       class="btn btn-info btn-xs edit px-3 py-2" type="button">
                                                        <i class="fas fa-eye"></i>
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
        @endif
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
