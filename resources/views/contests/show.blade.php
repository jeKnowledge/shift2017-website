@extends('layouts.platform')

@section('content')

        <h3>Contest</h3>

        <p>Name:<P>{{ $contest->name }}

        {{ Form::model($contest, ['route' => ['contests.destroy', $contest->id], 'method' => 'delete']) }}

            <div>
                {{ Form::submit('Eliminar Contest', ['class' => 'button']) }}
            </div>

        {{ Form::close() }}

@endsection
