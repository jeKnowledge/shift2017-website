@extends('layouts.platform')

@section('content')

        <h1>Novo Utilizador</h1>


        {!! Form::open(['action' => 'UsersController@store']) !!}

            <div>

                {!! Form::label('Nome') !!}
                {!! Form::text('name') !!}

            </div>

            <div>

                {!! Form::label('E-mail') !!}
                {!! Form::email('email') !!}

            </div>

            <div>

                {!! Form::label('Password') !!}
                {!! Form::password('password', ['class' => 'awesome']) !!}

            </div>

            <h3>Falta confirmar password</h3>

            <div>

                {!! Form::label('Bio:') !!}
                {!! Form::textarea('bio') !!}

            </div>

            <div>

                {!! Form::label('Long Bio:') !!}
                {!! Form::text('longBio') !!}

            </div>

            <div>

                {!! Form::label('Pitch') !!}
                {!! Form::text('pitch') !!}

            </div>

            <div>

                {!! Form::label('Photo') !!}
                {!! Form::text('photoPath') !!}

            </div>

            <div>

                {!! Form::label('Twitter:') !!}
                {!! Form::text('twitter') !!}

            </div>

            <div>

                {!! Form::label('GitHub:') !!}
                {!! Form::text('github') !!}

            </div>

            <div>
                {!! Form::submit('Registar') !!}
            </div>

        {!! Form::close() !!}

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

@endsection
