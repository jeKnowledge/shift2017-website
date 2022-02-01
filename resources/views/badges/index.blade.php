@extends('layouts.platform')

@section('content')

    <h3>Bagdes</h3>



        <div>
            <ul>
                @foreach ($badges as $badge)
                    <li>{{ $badge->name }}</li>
                @endforeach
            </ul>
        </div>

    <a href="{{route('badges.create')}}" class='button'>Novo Badge</a>


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
