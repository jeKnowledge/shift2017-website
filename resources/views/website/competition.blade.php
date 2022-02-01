@extends('layouts.website')

@section('content')
	<div class='fvw vh-60 bg-blue flex al-center jus-center dir-column'>
      	<h1 class='upper mopster t-center red competicao'>Competicao</h1>
    </div>
    <div class='parceiros bg-dark slide-two'>
		<h3 class='upper blue'>Juri</h3>
		<div class="flex wrap dir-row">
			<div class="flex dir-row wrap half juri">
				<img src='{{ asset('images/juri/cmota.jpg') }}' class="half">
				<div class="half ml-20">
					<h4 class="upper red">Nome</h4>
					<p class="light">Carlos Mota</p>
				</div>
			</div>
		</div>
		<div class="dir-row">
			<div class="half jus-center">
				<img src='{{ asset('images/icon4.svg') }}' class="w-15">
				<img src='{{ asset('images/icon3.svg') }}' class="w-15">
			</div>
		</div>
	</div>
@endsection
