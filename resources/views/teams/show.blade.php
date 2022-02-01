@extends('layouts.platform')

@section('content')

    <div class="edit-team">
        <div class="flex dir-row jus-between">
            <div class="half">
                <h3 class="upper blue">{{ $team->name }}</h3>
            </div>
        </div>
        <h5 class="mb-20">Membros</h5>
        <div class="flex jus-begin">
        	<div class="shifter flex w-35 mr-40 dir-column ">
        		<div class="flex photo">
                    <img src="{{ isset($team->owner->user->photoPath) != "" ? asset('images/photos/' . $team->owner->user->photoPath) : asset('images/placeholder.png')}}" alt="">
                    <div class="hover">
                        <a class="anchor" href="{{ route('shifters.show', ['shifter' => $team->owner->id])}}">Ver Perfil</a>
                    </div>
        		</div>
                <div class="flex jus-center">
                    {{ $team->owner->user->name }}
                </div>

                <div class="flex jus-center">
                    <h6>Master</h6>
                </div>
        	</div>
            @foreach($team->shifters()->get() as $shifter)
                @if($team->owner->id != $shifter->id)
                    <div class="shifter flex w-35 dir-column mr-40 ">
                        <div class="flex photo">
                            <img src="{{ isset($shifter->user->photoPath) != "" ? asset('images/photos/' . $shifter->user->photoPath) : asset('images/placeholder.png')}}" alt="">
                            <div class="hover">
                                <a class="anchor" href="{{ route('shifters.show', ['shifter' => $shifter->id])}}">Ver Perfil</a>
                            </div>
                        </div>
                        <div class="flex jus-center">
                            {{ $shifter->user->name }}
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        @if($team->project->name != "" && $team->project->description != "")
            <h5 class="mb-20 mt-50 mb-30">Projecto</h5>
            <h6>Nome</h6>
            <span class="mb-50">{{ $team->project->name }}</span>
            <h6>Descrição</h6>
            <span>{{ $team->project->description }}</span>
        @endif
    </div>

@endsection
