@extends('layouts.platform')

@section('content')

    {{ Form::model($roadshow, ['route' => ['roadshows.update', $roadshow->id ], 'method' => 'put']) }}

        <div>

            {{ Form::label('location') }}
            {{ Form::text('location', $value = $roadshow->location) }}

        </div>

        <div>

            {{ Form::label('institution') }}
            {{ Form::text('institution', $value = $roadshow->institution) }}

        </div>


        <div>

            {{ Form::submit('Update roadshow') }}

        </div>

    {{ Form::close()}}

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
