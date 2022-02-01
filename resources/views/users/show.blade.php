@extends('layouts.platform')

@section('content')

        <h3>{!! $user->name !!}</h3>

       @if(Auth::user()->isAdmin())

         {{ Form::model($user, ['route' => ['users.destroy', $user->id], 'method' => 'delete']) }}

             <!-- isto não deve ser para ficar aqui -->
             {{ Form::submit("Eliminar utilizador", ['class' => 'button']) }}
         {{ Form::close() }}


         {{ Form::model($user, ['route' => ['setRole', $user->id], 'method' => 'post']) }}

         <label class='mr-20 ml-10 upper fw'>Gold Partner</label>
         {{ Form::radio('partnerType', 'gold', true) }}

         <label class='mr-20 ml-10 upper fw'>Silver Partner</label>
         {{ Form::radio('partnerType', 'silver') }}

         <br>

         {{ Form::submit('Verify Partner', ['class' => 'button']) }}

         {{ Form::close() }}
        @endif

@endsection
