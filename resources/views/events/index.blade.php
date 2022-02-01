@extends('layouts.platform')

@section('content')
	<div class="edit-profile">

	    @if (\Auth::user()->isShifter())

			<div>
		            @foreach ($events as $event)

						<div display="inline-block">
							<a href="{{ route('events.show', ['event' => $event]) }}">{{ $event->name }}</a>
						</div>

		            @endforeach
			</div>

	    @else

			<div>
		            @foreach ($events as $event)

						<div display="inline-block">
							<a href="{{ route('events.show', ['event' => $event]) }}">{{ $event->name }}</a>
							<a href="{{ route('events.edit', ['event' => $event]) }}">Edit</a>
						</div>

		            @endforeach
			</div>

			<br>

			<a href="{{ url('platform/events/create ')}}" class='button'>Novo Evento</a>

	    @endif

	</div>

@endsection
