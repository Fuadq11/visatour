@extends('backend.layout.layout')

@section('title', __('pls_choose_documents'))

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3 class="text-info">{{ __('pls_choose_documents') }}</h3>
                        <h3 class="text-danger">({{ $visaOption->name }})</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-5">
            <form class="form" action="{{ route('admin.service.option.documents.store', $visaOption) }}" method="post">
                @csrf
                <div class="row">
                    @foreach ($documents as $document)
                        <div class="col-sm-6">
                            <label for="document-{{$document->id}}"
                                   style="font-size: 20px; margin-right: 5px">{{ $document->name }}</label>
                            <input id="document-{{$document->id}}" type="checkbox" name="documents[]"
                                   value="{{ $document->id }}"
                                   {{ in_array($document->id, $visaOption->documents->pluck('id')->toArray()) ? 'checked' : ''}}
                                   style="width: 25px; height: 25px">
                        </div>
                    @endforeach
                </div>
                <div class="btn-showcase text-end mt-4">
                    <button class="btn btn-outline-success" type="submit">{{ __('save') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
