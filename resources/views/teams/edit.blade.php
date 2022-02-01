@extends('layouts.platform')

@section('content')
    
    <div class="edit-team">
        <div class="flex dir-row jus-between">
            <div class="half">
                <h3 class="upper blue">{{ $team->name }}</h3>
            </div>
            <div class="half t-right">
                @if($team->shifters()->count()<4)
                    <a data-modal="addModal" class="modal-button button button-border">Adicionar Membro</a>
                @endif
            </div>
        </div>
        <h5 class="mb-20">Membros</h5>
        <div class="flex jus-begin">
        	<div class="shifter flex w-35 mr-40 dir-column ">
        		<div class="flex photo">
                    <img src="{{ isset($team->owner->user->photoPath) != "" ? asset('images/photos/' . $team->owner->user->photoPath) : asset('images/placeholder.png')}}" alt="">
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
                                <label class="anchor modal-button" data-shifter="{{$shifter->id}}" data-modal="removeModal">Remove shifter</label>
                            </div>
                        </div>
                        <div class="flex jus-center">
                            {{ $shifter->user->name }}
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        {{ Form::open(['route' => ['teams.update', $team->id], 'method' => 'put']) }}
            <h5 class="mb-20 mt-50 mb-30">Projecto</h5>
            {{ Form::label('name', 'Nome')}}
            {{ Form::text('name', isset($team->project->name) ? $team->project->name : null, ['placeholder' => 'Nome da tua app', 'class' => 'mt-10 mb-30 quarter']) }}
            {{ Form::label('description', 'Descrição')}}
            {{ Form::textarea('description', isset($team->project->description) ? $team->project->description : null, ['placeholder' => 'Descreve-nos o teu projecto, é importante que consigas explicar bem todos os detalhes para que o juri consiga perceber qual a complexidade e trabalho que o mesmo vai exigir!', 'class' => 'mt-10 mb-30']) }}

            {{ Form::submit('Guardar', ['class' => 'button']) }}
        {{ Form::close() }}

        <div id="addModal" class="modal">
            <div class="modal-content quarter bg-light dark">
                <form>
                    <span class="close white">&times;</span>
                    
                    <h4><strong>Adicionar membro</strong></h4>
                    {{ Form::text('name', null, ['class' => 'fw', 'id'=>"search-shifters-string", 'placeholder' => 'Pesquisar shifter'])}}
                    <table class="table table-hover hide list-shifters fw t-left mb-20">
                        <thead>
                            <tr>
                                <th class="half">Nome</th>
                                {{-- <th class="half">Email</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <div class="flex fw jus-end">
                        <span class="button" id="search-shifters-button">Pesquisar</span>
                    </div>
                </form>
                {{ Form::open(['route' => ['teams.update', $team->id], 'method' => 'put']) }}
                    <div class="flex fw jus-end">
                        {{ Form::hidden('add_shifter') }}
                        {{ Form::submit('Adicionar', ['class' => 'button hide']) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
        <div id="removeModal" class="modal">
            <div class="modal-content quarter bg-light dark">
                <span class="close white">&times;</span>
                <strong>Tem a certeza que quer remover este shifter?</strong>
                {{ Form::open(['route' => ['teams.update', $team->id], 'method' => 'put']) }}
                    {{ Form::hidden('remove_shifter') }}
                    <div class="flex fw jus-between mt-50">
                        {{ Form::submit('Remover', ['class' => 'button']) }}
                        <span class="button button-border cancel">Cancelar</span>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
