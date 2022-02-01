@extends('layouts.website')

@section('content')
	<div class='fvw vh-60 bg-yellow flex al-center jus-center dir-column'>
      <h1 class='upper mopster t-center blue faq'>FAQ</h1>
    </div>

    <div class='intro bg-dark slide-one' id='programa'>
      <div class='flex dir-column mb-30'>

        @foreach ($faqs as $faq)
			<div class='w-100 bdb-light mt-30 faqs'>
				<div class="clickable flex w-100">
		          <div class='icon close left ml-10 mr-20 w-20'>
		            <div class='one'></div>
		            <div class='two'></div>
		          </div>
		          <div class='w-80 mb-30 left'>
		            <h4 class='light click'>{{ $faq->question }}</h4>
		          </div>
				</div>
	        	<p class='light mb-30'>{!! $faq->answer !!} </p>
	        </div>
        @endforeach


      </div>
    </div>
@endsection
