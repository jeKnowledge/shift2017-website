@extends('layouts.platform')

@section('content')

    <h3>Utilizadores</h3>
    <table class="table fw">
        <thead>
            <tr>
                <td>Nome</td>
                <td>Email</td>
                <td>Role</td>
                <td>&nbsp;</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    @if($user->isShifter())
                        <td>Shifter</ld>
                    @elseif($user->isAdmin())
                        <td>Admin</ld>
                    @elseif($user->isStaff())
                        <td>Staff</ld>
                    @elseif($user->isSilverPartner())
                        <td>Silver Partner</ld>
                    @elseif($user->isGoldPartner())
                        <td>Gold Partner</ld>
                    @else
                        <td>&nbsp;</td>
                    @endif
                    <td class="t-right">
                        <a href="{{route('users.show', ['user' => $user->id])}}">Detalhes</a> |
                        <a href="{{route('users.edit', ['user' => $user->id])}}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
