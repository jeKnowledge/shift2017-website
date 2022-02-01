@extends('layouts.website')

@section('content')
	<div class='fvw vh-60 bg-blue flex al-center jus-center dir-column'>
		<h1 class='upper mopster t-center yellow sobre'>SOBRE</h1>
	</div>
	<div class='intro bg-dark' id='sobre'>
		<div class='sobre flex dir-column mt-50 mb-50'>
			<img src='{{ asset('images/website/about_3.jpg') }}' class='fw mt-40 mb-75' alt='evento'>
			<h3 class='light mb-30'><span class='shift-appens mopster blue'>Shift Appens</span></h3>
			<p class='light'>
				Destina-se a todos os entusiastas tecnológicos! Neste hackathon
				terás <span class='blue'>48 horas</span> para dar vida à aplicação que tens na cabeça, com a
				ajuda de amigos que também tenham entrado nesta aventura, ou com mais
				malta que tal como tu tem paixão e vontade de trabalhar. O hackathon
				mais louco do país este ano decorrerá no Pavilhão Mário Mexia, em
				Coimbra, um local verdadeiramente indicado para te prepares e mostrares
				o que vales nesta maratona de código! Irás encontrar neste Pavilhão um
				ambiente descontraído e propício à criação das melhores aplicações
				de sempre.<br>
				Na sua 4ª edição, o Shift APPens não pára de crescer. Somando nas 3
				primeiras edições mais de 200 participantes, nesta nova casa, bem no
				coração da cidade de Coimbra, estão reunidas todas as condições para
				que a população de Shifters continue a aumentar!
			</p>
		</div>
		<h3 class='light mb-50'><span class='mopster yellow'>Documentos Oficiais</span></h3>
		<a href="{{ route('download.regulation')}}" class="button button-regulation" target="_blank">Regulamento</a>
	</div>
@endsection
