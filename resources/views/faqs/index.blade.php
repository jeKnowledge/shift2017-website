@extends('layouts.platform')

@section('content')

    <h3>FAQs</h3>

    @foreach ($faqs as $faq)
        <div class="">

            <a href="{{ route('faqs.show', ['faq' => $faq]) }}">{{$faq->question}}</a>
            <a href="{{route('faqs.edit', ['faq' => $faq]) }}">Edit</a>

        </div>
    @endforeach

    <br>

    <a href="{{ route('faqs.create')}}" class='button'>Nova FAQ</a>

@endsection
