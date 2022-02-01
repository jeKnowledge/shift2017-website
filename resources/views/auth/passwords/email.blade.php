@extends('auth.layout')

@section('content')
    <div class='flex dir-row al-center wrap fvh jus-between'>
        <div class='half flex dir-column jus-start'>
            <a href='{{ url('/') }}' class='half'><h2 class='blue mopster'>A</h2></a>
            <p class='light b mt-30'>Então ainda não tens conta?</p>
            <p class='light b mt-10'>Regista-te já <a href='{{ url('auth/register') }}' class='white under'>aqui</a></p>
        </div>
        <div class='bg-light half reset-form'>
            <h3 class='upper blue mb-30 mt-30'>Reset Password</h3>
            {{ Form::open(['url' => 'auth/password/email']) }}
                <span class="flex mb-30">Preenche o teu email para receberes o link de recuperar password</span>
                <input type="email" name="email" value="{{ old('email') }}" class="input-text input-1 dark fw" required onkeyup="this.setAttribute('value', this.value);"/>
                <span class="floating-label label-1 dark">E-mail</span>
                <button type="submit" class='button click asap mr-30'>Enviar Link</button>
            {{ Form::close() }}
            @if (count($errors) > 0)
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection