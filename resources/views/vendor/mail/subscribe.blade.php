@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            Abunə olunma
        @endcomponent
    @endslot

    Email: <strong>{{ $form['email'] }}</strong> <br>

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © 2024 {{ config('app.name') }}
        @endcomponent
    @endslot
@endcomponent

