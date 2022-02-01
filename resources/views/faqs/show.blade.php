@extends('layouts.platform')

@section('content')

    <h3>FAQ</h3>
    <div>
        {{ $faq->question }}
    </div>
    <div>
        {{ $faq->answer }}
    </div>

    <br>

    {{ Form::model($faq, ['route' => ['faqs.destroy', $faq->id], 'method' => 'delete']) }}

        <!-- isto não deve ser para ficar aqui -->
        {{ Form::submit('Eliminar FAQ', ['class' => 'button']) }}

    {{ Form::close() }}

@endsection
