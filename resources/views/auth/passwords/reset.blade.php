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
            {{ Form::open(['url' => 'auth/password/reset']) }}
                <input type="hidden" name="token" value="{{ $token }}">
                <span class="flex mb-30">Preenche o teu e-mail de registo e escolhe a nova password (não te esqueças de a confirmar!)</span>
                <input type="email" name="email" value="{{ old('email') }}" class="input-text input-1 dark fw" required onkeyup="this.setAttribute('value', this.value);"/>
                <span class="floating-label label-1 dark">E-mail</span>
                <input type="password" name="password" value="" class="input-text input-2 dark fw" required onkeyup="this.setAttribute('value', this.value);"/>
                <span class="floating-label label-2 dark">Password</span>
                <input type="password" name="password_confirmation" value="" class="input-text input-3 dark fw" required onkeyup="this.setAttribute('value', this.value);"/>
                <span class="floating-label label-3 dark">Confirmar Password</span>
                <button type="submit" class='button click asap mr-30'>Alterar password</button>
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