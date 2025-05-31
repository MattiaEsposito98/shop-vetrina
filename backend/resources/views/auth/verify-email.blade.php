@extends('layouts.guest')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="alert alert-info">
                    Grazie per esserti registrato! Prima di iniziare, verifica il tuo indirizzo email cliccando sul link che
                    ti abbiamo inviato. Se non hai ricevuto l'email, possiamo inviartene un'altra.
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success">
                        Un nuovo link di verifica è stato inviato all'indirizzo email che hai fornito durante la
                        registrazione.
                    </div>
                @endif

                <div class="d-flex justify-content-between mt-4">
                    {{-- Invia di nuovo il link di verifica --}}
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            Invia nuovamente l'email di verifica
                        </button>
                    </form>

                    {{-- Logout --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary">
                            Logout
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
