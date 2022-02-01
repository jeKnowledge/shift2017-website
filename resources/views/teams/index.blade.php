@extends('layouts.platform')

@section('content')

    <h3 class="blue upper">Equipas</h3>

    <div class="teams">
    	<div class="flex wrap dir-row">
    		@if(Auth::user()->isShifter() && Auth::user()->shifter->team()->count() == 0)
		    	<div class="quarter mb-50 t-center">
		    		<a data-modal="createModal" class="modal-button flex team bg-gray bd-light dark w-90 mr-40">
		    			<div class="flex jus-center self-center fw">
		    				<h4><strong>+ Criar Equipa</strong></h4>
		    			</div>
		    		</a>
		    	</div>
		    	@foreach($teams as $team)
			    	<div class="quarter mb-50 t-center">
			    		<a href="{{ route('teams.show', ['id' => $team->id]) }}" class="flex team bg-gray bd-light dark w-90 mr-40">
			    			<div class="flex jus-center self-center fw">
			    				<h4><strong>{{ $team->name }}</strong></h4>
			    			</div>
			    		</a>
			    	</div>
		    	@endforeach
		    @elseif(Auth::user()->isAdmin() || Auth::user()->isPartner())
		    	@foreach($teams as $team)
			    	<div class="quarter mb-50 t-center">
			    		<a href="{{ route('teams.edit', ['id' => $team->id]) }}" class="flex team bg-gray bd-light dark w-90 mr-40">
			    			<div class="flex jus-center self-center fw">
			    				<h4><strong>{{ $team->name }}</strong></h4>
			    			</div>
			    		</a>
			    	</div>
		    	@endforeach
	    	@else
	    		<div class="quarter mb-50 t-center">
		    		<a href="{{ route('teams.edit', ['id' => Auth::user()->shifter->team->first()->id]) }}" class="flex team bg-gray bd-light dark w-90 mr-40">
		    			<div class="flex jus-center self-center fw">
		    				<h4><strong>{{ Auth::user()->shifter->team->first()->name }}</strong></h4>
		    			</div>
		    		</a>
		    	</div>
		    	@foreach($teams as $team)
		    		@if($team->id != Auth::user()->shifter->team->first()->id)
				    	<div class="quarter mb-50 t-center">
				    		<a href="{{ route('teams.show', ['id' => $team->id]) }}" class="flex team bg-gray bd-light dark w-90 mr-40">
				    			<div class="flex jus-center self-center fw">
				    				<h4><strong>{{ $team->name }}</strong></h4>
				    			</div>
				    		</a>
				    	</div>
				    @endif
		    	@endforeach
			@endif
    	</div>
    </div>

    <div id="createModal" class="modal">
		<div class="modal-content quarter bg-light dark">
			<span class="close white">&times;</span>
			{{ Form::open(['route' => 'teams.store', 'method' => 'post']) }}
				<h4><strong>Equipa</strong></h4>
				{{ Form::text('name', null, ['class' => 'fw', 'placeholder' => 'Nome da Equipa'])}}
				{{ Form::submit('Criar', ['class' => 'button']) }}
			{{ Form::close() }}
		</div>
	</div>

@endsection
