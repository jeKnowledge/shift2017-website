@extends('layouts.platform')

@section('content')

    <h3>Candidaturas</h3>
    <table class="table fw">
        <thead>
            <tr>
                <td>Nome</td>
                <td>Email</td>
                <td>Status</td>
                <td>T-Shirt</td>
                <td>&nbsp;</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($applications as $application)
                <tr>
                    <td>{{$application->shifter->user->name}}</td>
                    <td>{{$application->shifter->user->email}}</td>
                    @if($application->accepted != "")
                        <td>Aceite</ld>
                    @else
                        <td> - </td>
                    @endif
                    <td>{{$application->tshirt}}</td>
                    <td class="t-right">
                        <a href="{{route('applications.show', ['application' => $application->id])}}">Detalhes</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
