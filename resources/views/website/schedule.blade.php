@extends('layouts.website')

@section('content')
	<div class='fvw vh-60 bg-red flex al-center jus-center dir-column'>
      <h1 class='upper mopster t-center yellow programa'>PROGRAMA</h1>
    </div>

    <div class='intro bg-dark slide-one' id='programa'>
      <div id="tabs" class='programa flex dir-column mt-50 mb-50'>
        <nav class='w-80 flex dir-row wrap jus-center self-center'>
          <a href="#day-one" class='third tab-title'><button class="button programa selected">dia 17<button></a>
          <a href="#day-two" class='third tab-title'><button class="button programa">dia 18</button></a>
          <a href="#day-three" class='third tab-title'><button class="button programa">dia 19</button></a>
        </nav>

        <div class='w-100 bdb-red mt-100'>
          <p class='upper red w-25 left mb-20 ml-10'>Horas</p>
          <p class='upper red w-70 left mb-20'>DESCRIÇÃO</p>
        </div>

		{{-- <p class='upper red w-25 left mb-20 ml-10', style='margin-top:5%'>Dia 17</p> --}}
		<div id="day-one" class="tab-content flex dir-column selected">
			@foreach ($events as $event)

				@if (\Carbon\Carbon::parse($event->startDate)->format('d') == 17)
					<div class='w-100 bdb-light mt-20'>
			          <p class='light w-25 left mb-20 ml-10'>{{ \Carbon\Carbon::parse($event->startDate)->format('H:i') }}</p>
			          <p class='light w-70 left mb-20'>{{ $event->name }}</p>
			        </div>
				@endif

			@endforeach
		</div>

		{{-- <p class='upper red w-25 left mb-20 ml-10', style='margin-top:5%' >Dia 18</p> --}}
		<div id="day-two" class="tab-content flex dir-column">
			@foreach ($events as $event)

				@if (\Carbon\Carbon::parse($event->startDate)->format('d') == 18)
					<div class='w-100 bdb-light mt-20'>
					  <p class='light w-25 left mb-20 ml-10'>{{ \Carbon\Carbon::parse($event->startDate)->format('H:i') }}</p>
					  <p class='light w-70 left mb-20'>{{ $event->name }}</p>
					</div>
				@endif

			@endforeach
		</div>

		{{-- <p class='upper red w-25 left mb-20 ml-10', style='margin-top:5%'>Dia 19</p> --}}
		<div id="day-three" class="tab-content flex dir-column">
			@foreach ($events as $event)

				@if (\Carbon\Carbon::parse($event->startDate)->format('d') == 19)
					<div class='w-100 bdb-light mt-20'>
					  <p class='light w-25 left mb-20 ml-10'>{{ \Carbon\Carbon::parse($event->startDate)->format('H:i') }}</p>
					  <p class='light w-70 left mb-20'>{{ $event->name }}</p>
					</div>
				@endif

			@endforeach
		</div>
      </div>
    </div>
@endsection
