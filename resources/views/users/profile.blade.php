@extends('layouts.platform')

@section('content')
	<div class="edit-profile">
		
	    @if (\Auth::user()->isShifter())

	        @include('users._shifter')

	    @else
	        
	        @include('users._user')

	    @endif

	</div>

@endsection
