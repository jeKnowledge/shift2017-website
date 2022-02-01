@extends('layouts.platform')

@section('content')
    <div class='dash-content'>

        <form class='flex dir-row al-center'>
            <input type="radio" name="radios" value="r1" checked>Radio 1
            <input type="radio" name="radios" value="r2">Radio 2
            <input type="radio" name="radios" value="r3">Radio 3
        </form>

        {{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) }}

            <div>

                {!! Form::label('Nome'); !!}
                {!! Form::text('name', $value = $user->name, null, ['class' => "dark input-text"]); !!}

            </div>

            <div>

                {!! Form::label('E-mail'); !!}
                {!! Form::email('email', $value = $user->email); !!}

            </div>


            <div>
                {!! Form::label('Student'); !!}
                <br>
                {!! Form::radio('student', 'yes') !!} Sim
                {!! Form::radio('student', 'no'); !!} Não
            </div>

            <div>
                {!! Form::label('University'); !!}
                {!! Form::text('university', $value = $user->university); !!}
            </div>

            <div>
                {!! Form::label('Course'); !!}
                {!! Form::text('course', $value = $user->course); !!}
            </div>

            <div>
                {!! Form::label('Company'); !!}
                {!! Form::text('company', $value = $user->company); !!}
            </div>

            <div>
                {!! Form::label('Role'); !!}
                {!! Form::text('role', $value = $user->role); !!}
            </div>

             <div>
                {!! Form::label('Location'); !!}
                {!! Form::text('location', $value = $user->location); !!}
            </div>

            <div>
                {!! Form::label('Bio'); !!}
                {!! Form::textarea('bio', $value = $user->bio); !!}
            </div>

            <div>
                {!! Form::label('Phone'); !!}
                {!! Form::text('course', $value = $user->course); !!}
            </div>

            <div>
                {!! Form::label('Twitter'); !!}
                {!! Form::text('twitter', $value = $user->twitter); !!}
            </div>

            <div>
                {!! Form::label('Github'); !!}
                {!! Form::text('github', $value = $user->github); !!}
            </div>

            <div>
                {!! Form::label('Website'); !!}
                {!! Form::text('website', $value = $user->website); !!}
            </div>

            <div>
                {!! Form::submit('Registar', ['class' => 'button']); !!}
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
    </div>
@endsection
