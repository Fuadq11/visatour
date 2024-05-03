@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            Əlaqə
        @endcomponent
    @endslot

    Ad soyad: <strong>{{ $form['name'] }}</strong> <br>
    Email: <strong>{{ $form['email'] }}</strong> <br>
    Mövzu: <strong>{{ $form['subject'] }}</strong> <br>
    Mesaj: <strong>{{ $form['message'] }}</strong> <br>

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © 2024 {{ config('app.name') }}
        @endcomponent
    @endslot
@endcomponent

