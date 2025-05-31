@extends('layouts.guest')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="alert alert-info">
                    Hai dimenticato la password? Nessun problema. Inserisci il tuo indirizzo email e ti invieremo un link
                    per reimpostarla.
                </div>

                {{-- Messaggio di stato (es. "link inviato") --}}
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            class="form-control @error('email') is-invalid @enderror" autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">
                            Invia link per reimpostare la password
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
