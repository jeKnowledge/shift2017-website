@extends('layouts.platform')

@section('content')

    <h3>Editar FAQ</h3>

    {{ Form::model($faq, ['route' => ['faqs.update', $faq->id], 'method' => 'put'])  }}

        <div>
            {{ Form::label('Question') }}
            {{ Form::text('question', $faq->question) }}
        </div>

        <div>
            {{ Form::label('Answer') }}
            {{ Form::textarea('answer', $faq->answer) }}
        </div>

        <div>
            {{ Form::submit('Guardar', ['class' => 'button']) }}
        </div>

    {{ Form::close() }}

@endsection
