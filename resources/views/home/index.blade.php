@extends('layouts.platform')

@section('content')
	<div class="dir-row fw flex al-center jus-between">
		<div class='desafios flex wrap dir-row self-start two-thirds mb-50'>
			<h5 class="flex mb-20 fw">Desafios</h5>
			@foreach ($contests as $contest)
				<a data-modal="detailModal" data-name="{{$contest->name}}" data-description="{!! $contest->description !!}" class="modal-button flex contest bg-gray bd-light dark quarter mr-40">
	    			<div class="flex jus-center self-center fw">
	    				<strong>{{$contest->name}}</strong>
	    			</div>
	    		</a>
			@endforeach
        </div>
	    <div class='programa flex dir-column self-end quarter mb-50'>
	        <h5>Próximos eventos</h5>

	        <div class='w-100 mt-20 bdb-blue'>
	          	<p class='upper blue w-25 left'>Horas</p>
	          	<p class='upper blue w-70 left'>DESCRIÇÃO</p>
	        </div>
			@foreach ($events as $event)

				<div class='w-100 mt-20'>
		          <p class='dark w-25 left'>{{ \Carbon\Carbon::parse($event->startDate)->format('H:i') }}</p>
		          <p class='dark w-70 left'>{{ $event->name }}</p>
		        </div>

			@endforeach
		</div>
	</div>


    <div id="detailModal" class="modal">
		<div class="modal-content quarter bg-light dark">
			<span class="close white">&times;</span>
			<h4 class="name"></h4>
			<p class="description mt-20"></p>
		</div>
	</div>
@endsection