

        {{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) }}

            {{ Form::hidden('action', 'profile_b') }}

            <div>
                {{ Form::label('Nome:') }}
                {{ Form::text('name', $user->name) }}
            </div>

            <div>
                {{ Form::label('Idade:') }}
                {{ Form::text('age', $user->age) }}
            </div>

            <div>
                {{ Form::label('Password Antiga:') }}
                {{ Form::password('old_password') }}
            </div>

            <div>
                {{ Form::label('Nova Password:') }}
                {{ Form::password('password') }}
            </div>

            <div>
                {{ Form::label('Confirmar Password:') }}
                {{ Form::password('password_confirmation') }}
            </div>

            <div>
                {{ Form::label('Photo Path:') }}
                {{ Form::text('photoPath', $user->photoPath) }}
            </div>



            {{ Form::submit('Actualizar Perfil', ['class' => 'button']) }}

        {{ Form::close() }}

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
