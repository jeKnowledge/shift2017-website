@extends('auth.layout')

@section('content')
    <div class='flex dir-row al-center wrap fvh jus-between'>
        <div class='half flex dir-column jus-start'>
            <a href='{{ url('/') }}'><h2 class='blue mopster'>A</h2></a>
            <p class='light b mt-30'>Já tens conta Shifter?</p>
            <p class='light b mt-10'>Então estás perdido, o login está <a href='{{ url('auth/login') }}' class='white under'>aqui</a></p>
        </div>
        <div class='bg-light half login-form'>
            <h3 class='upper blue mb-30 mt-30'>Regista-te!</h3>
            {{ Form::open(['url' => 'auth/register']) }}
                <input type="text" name="name" value="{{ old('name') }}" class="input-text input-1 dark fw" required onkeyup="this.setAttribute('value', this.value);"/>
                <span class="floating-label label-1 dark">Nome</span>
                <input type="email" name="email" value="{{ old('email') }}" class="input-text input-2 dark fw" required onkeyup="this.setAttribute('value', this.value);"/>
                <span class="floating-label label-2 dark">E-mail</span>
                <input type="password" name="password" value="" class="input-text input-3 dark fw" required onkeyup="this.setAttribute('value', this.value);"/>
                <span class="floating-label label-3 dark">Password</span>
                <input type="password" name="password_confirmation" value="" class="input-text input-4 dark fw" required onkeyup="this.setAttribute('value', this.value);"/>
                <span class="floating-label label-4 dark">Confirmar Password</span>
                @if ($errors->any())
                    @foreach($errors->all() as $error)
                        <span class="help-block">
                            <strong>{{ $error }}</strong>
                            <br>
                        </span>
                    @endforeach
                @endif
                <div class="mt-20">
                    <button type="submit" class='button click asap mr-30'>Registar</button>
                </div>
            {{ Form::close() }}
            <div class='flex wrap dir-row jus-between'>
                <p class='t-center w-100 mb-20'>Ou entra com uma destas contas.</p>
                <a href="{{ url('auth/github') }}" class='button button-border t-center auth'>Github</a>
                <a href="{{ url('auth/google') }}" class='button button-border t-center auth'>Google</a>
                <a href="{{ url('auth/facebook') }}" class='button button-border t-center auth'>Facebook</a>
            </div>
        </div>
    </div>
@endsection
