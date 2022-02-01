@extends('layouts.platform')

@section('content')

        <h3>Candidatura</h3>
        <p>Nome: {{$application->shifter->user->name}}</p>
        <p>Idade: {{$application->shifter->age}}</p>
        <p>Localidade: {{$application->shifter->location}}</p>
        <p>Função: {{$application->shifter->type}}</p>
        @if($application->shifter->student == true)
            <p>Estudante: Sim</p>
            <p>Universidade: {{$application->shifter->university}}</p>
            <p>Curso: {{$application->shifter->course}}</p>
        @else
            <p>Estudante: Não</p>
            <p>Instituição: {{$application->shifter->institution}}</p>
            <p>Role: {{$application->shifter->role}}</p>
        @endif
        <p>Bio: {{$application->shifter->bio}}</p>
        <p>Pitch: {{$application->pitch}}</p>
        <p>Skills: 
            @foreach($application->skills()->get() as $skill)
                {{$skill->name}}
            @endforeach
        </p>
        <p>T-shirt: {{$application->tshirt}}</p>
        <p>Primeira vez: {{$application->firstTime}}</p>
        <p>Twitter: {{$application->shifter->twitter}}</p>
        <p>Github: {{$application->shifter->github}}</p>
        <p>Website: {{$application->shifter->website}}</p>
        <p>Portefolio: {{$application->portefolio}}</p>
        <p>URLs úteis: {{$application->urls}}</p>
        <p>URLs úteis: {{$application->comments}}</p>
        @if(Auth::user()->isAdmin())
            @if($application->accepted == null)
                <div>
                    {{Form::model($application, ['route' => ['applications.evaluate', $application->id], 'method' => 'put'])}}
                        {{Form::hidden('accepted', '1')}}
                        {{Form::submit('Aceitar Candidatura', ['class' => 'button flex'])}}
                    {{Form::close()}}
                    {{Form::model($application, ['route' => ['applications.evaluate', $application->id], 'method' => 'put'])}}
                        {{Form::hidden('accepted', '0')}}
                        {{Form::submit('Rejeitar Candidatura', ['class' => 'button flex button-border'])}}
                    {{Form::close()}}
                </div>
            @endif
        @elseif(Auth::user()->isShifter() && $application->accepted == null)
            <br>
            <a href="{{route('applications.create')}}" class="button">Editar candidatura</a>
        @endif
@endsection
