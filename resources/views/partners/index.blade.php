@extends('layouts.platform')

@section('content')

	<h1>Parceiros</h1>
    <div>
        <ul>
            @foreach ($partners as $partner)
                <li><a href="{{ route('partners.show', ['partner' => $partner]) }}">{{ $partner->name }}</a></li>
            @endforeach
        </ul>
    </div>

@endsection
