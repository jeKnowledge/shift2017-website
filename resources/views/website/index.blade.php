@extends('layouts.website')

@section('content')
	<div class='fvw fvh bg-red flex al-center jus-center dir-column intro-scroll'>
		<h1 class='upper mopster t-center blue shift-appens'>Shift appens</h1>
		{{-- <div class='timer t-center light ' id='clockdiv'>
			<span class="days" id='days'></span><span>d</span>
			<span class="hours" id='hours'></span><span>h</span>
			<span class="minutes" id='minutes'></span><span>m</span>
			<span class="seconds" id='seconds'></span><span>s</span>
		</div> --}}
		<h2 class='white t-center'>O Hackathon onde a tua APP ganha vida!</h2>
	</div>
	<div class='intro bg-dark slide-one' id='intro'>
		<div class='intro-conteudo flex dir-column mt-50 mb-50'>
			<h3 class='upper yellow'>Shift Appens</h3>
			<p class='white'>
				Nos dias 17, 18 e 19 de fevereiro de 2017, tu e a tua equipa vão
				poder desenvolver uma APP num espaço onde encontrarão programadores
				e designers de todos os cantos do país. O Pavilhão Mário Mexia, em
				Coimbra, será o palco onde, após muito código e muito café, poderás
				apresentar o projeto desenvolvido ao júri e entrar na corrida pelos
				prémios!
			</p>

			<div class='fw mt-40 mb-40 pavilhao' style='height: 40rem;'></div>
			{{-- <nav class='self-end'>
				<a><img src='#' alt='twitter'></a>
				<a><img src='facebook.com/whereshiftappens' alt='facebook'></a>
			</nav> --}}
		</div>
	</div>

	<div class='parceiros bg-light slide-two'>
		<h3 class='upper red'>Parceiros</h3>
		<p>
			Como sem os nossos parceiros a tarefa de tornar este Shift tão
			fantástico tornar-se-ia mais difícil, espreita as empresas que
			contribuíram para esta 4ª edição e que nos ajudaram a proporcionar-te
			um hackathon à tua medida!
		</p>
		<h5 class='upper black mt-50'>Patrocinadores</h5>
		<div class='flex dir-row wrap jus-around al-center mt-50'>
			<a href="http://redlightsoft.com" target="_blank" class="w-15"><img src='{{ asset('images/partners/redlight.svg') }}' alt='redlight' class='fw'></a>
			<a href="https://www.whitesmith.co" target="_blank" class="quarter"><img src='{{ asset('images/partners/whitesmith-logo.svg') }}' alt='whitesmith' class='fw'></a>
			<a href="http://www.rightitservices.com" target="_blank" class="quarter"><img src="{{ asset('images/partners/rightit.png') }}" class="fw mt-50" alt="rightitservices"></a>
			<a href="https://www.accenture.com/pt-pt" target="_blank" class="w-15"><img src="{{ asset('images/partners/accenture.png') }}" class="fw mt-50 " alt="accenture"></a>
		</div>
		<div class='flex dir-row wrap jus-around al-center mt-50'>
			<a href="http://www.ipn.pt/" target="_blank" class="w-15"><img src="{{ asset('images/partners/ipn.png') }}" class="fw mt-50" alt="ipn"></a>
			<a href="http://www.space.ipn.pt/" target="_blank" class="quarter"><img src="{{ asset('images/partners/esabic.png') }}" class="fw mt-50" alt="esabic"></a>
			<a href="https://www.wit-software.pt/" target="_blank" class="w-15"><img src="{{ asset('images/partners/wit.png') }}" class="fw mt-50" alt="wit"></a>
			<a href="http://www.glintt.com/" target="_blank" class="w-15"><img src="{{ asset('images/partners/glintt.png') }}" class="fw mt-50" alt="glintt"></a>
		</div>
		<div class='flex dir-row wrap jus-around al-center mt-10'>
			<a href="http://www.novabase.pt/" target="_blank" class="w-15"><img src="{{ asset('images/partners/novabase.png') }}" class="fw mt-50" alt="novabase"></a>
			<a href="http://www.fct.uc.pt/" target="_blank" class="quarter"><img src="{{ asset('images/partners/fctuc.png') }}" class="fw mt-50" alt="fctuc"></a>
			<a href="http://www.itgrow.pt/" target="_blank" class="w-15"><img src="{{ asset('images/partners/itgrow.png') }}" class="fw mt-50" alt="itgrow"></a>
			<a href="http://www.criticalsoftware.com/" target="_blank" class="w-10"><img src="{{ asset('images/partners/critical.png') }}" class="fw mt-50" alt="critical"></a>
		</div>
		<div class='flex dir-row wrap jus-around al-center mt-10'>
			<a href="http://www.deemaze.com/" target="_blank" class="w-15"><img src="{{ asset('images/partners/deemaze.png') }}" class="fw mt-50" alt="deemaze"></a>
			<div class="w-15"><img src="{{ asset('images/partners/trifida.png') }}" class="fw mt-50" alt="trifida"></div>
		</div>
		<h5 class='upper black mt-50'>Media Partners</h5>
		<div class='flex dir-row wrap jus-around al-center mt-10'>
			<div class="quarter"><img src="{{ asset('images/partners/academicastartuc.png') }}" class="fw mt-50" alt="academicastartuc"></div>
			<div class="quarter"><img src="{{ asset('images/partners/i9.png') }}" class="fw mt-50" alt="i9"></div>
			<div class="quarter"><img src="{{ asset('images/partners/programar.png') }}" class="fw mt-50" alt="programar"></div>
			<a href="http://www.almashopping.pt/" target="_blank" class="w-15"><img src="{{ asset('images/partners/alma.png') }}" class="fw mt-50" alt="alma"></a>
		</div>
		<h5 class='upper black mt-50'>Parceiros Alimentares</h5>
		<div class='flex dir-row wrap jus-around mt-10'>
			<div class="w-15"><img src="{{ asset('images/partners/beirao.png') }}" class="fw mt-50" alt="beirao"></div>
			<div class="w-15"><img src="{{ asset('images/partners/buondi.png') }}" class="fw mt-50" alt="buondi"></div>
			<div class="w-15"><img src="{{ asset('images/partners/reidosfrangos.svg') }}" class="fw mt-50" alt="reidosfrangos"></div>
		</div>
	</div>

	<div class='organizacao bg-yellow flex wrap dir-row jus-between'>
		<h3 class='upper red w-100'>Organização</h3>
		<div class='half flex wrap dir-row al-center'>
			<a href='https://nei.dei.uc.pt/' class='organizer mr-50' target='_blank'>
				<img src='{{ asset('images/NEIAAC.png') }}' alt='NEI'>
			</a>
			<p>
				info@shiftappens.com<br>
				neiaac@student.dei.uc.pt<br>
				239 790 002
			</p>
		</div>

		<div class='half flex wrap dir-row al-center'>
			<a href='http://jeknowledge.pt/?lang=pt' class='organizer mr-50' target='_blank'>
				<img src='{{ asset('images/jek.png') }}' alt='JeK'>
			</a>
			<p>
				info@shiftappens.com<br>
				geral@jeknowlegde.com<br>
				914 291 234
			</p>
		</div>
		<h5 class='upper red w-100 mt-50'>Com o apoio de</h5>
		<div class='half mt-20'>
			<a href='http://www.cm-coimbra.pt' class="cmc organizer"><img src='{{ asset('images/cmc.png') }}' alt='Camara'></a>
		</div>
	</div>
@endsection
