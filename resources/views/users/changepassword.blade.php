@extends('layouts.platform')

@section('content')
    <div class="edit-profile">
        <div class="flex dir-row mb-20">
            <div class="fw">
                <div class="header flex dir-row">
                    <div class="w-15 mb-20">
                        <div class="photo">
                            @if($user->photoPath != "")
                                <img src="{{ asset('images/photos/' . $user->photoPath) }}" alt="">
                            @else
                                <img src="{{ asset('images/placeholder.png') }}" alt="">
                            @endif
                            <div class="hover">
                                <label for="photoFile" class="file-anchor">Alterar foto</label>
                                <input type="file" name="photoFile" id="photoFile" class="show-for-sr file-input">
                                {{ Form::hidden('photoPath') }}
                            </div>
                        </div>
                    </div>
                    <div class="quarter ml-50 mb-20 flex al-end">
                        <h3 class="mb-15">{{ Auth::user()->name }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex dir-row jus-between">
            <div class="half">
                <h3 class="upper blue">Alterar Password</h3>
            </div>
            <div class="half t-right">
                <a href="{{ route('platform.profile') }}" class="button button-border">Editar Perfil</a>
            </div>
        </div>

        {{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) }}

            {{ Form::hidden('action', 'change_password') }}
            
            <div class="flex dir-row jus-between">
                <div class="half">
                    {{ Form::label('Nova Password *') }}
                    {{ Form::password('password', ['placeholder' => 'Password', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'dark input-text fw']) }}
                </div>
                <div class="half">
                    {{ Form::label('Confirmar Password *') }}
                    {{ Form::password('password_confirmation', ['placeholder' => 'Confirmar Password', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'dark input-text fw']) }}
                </div>
            </div>

            <div class="flex dir-row mt-10 mb-20">
                <div class="fw">
                    * campos obrigatórios
                </div>
            </div>

            {{ Form::submit('Alterar Password', ['class' => 'button']) }}

        {{ Form::close() }}

	</div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
