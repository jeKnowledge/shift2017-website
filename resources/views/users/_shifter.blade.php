{{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put', "enctype" => "multipart/form-data"]) }}
    {{ Form::hidden('action', 'profile_a') }}
    <div class="flex dir-row mb-20">
        <div class="fw">
            <div class="header flex dir-row">
                <div class="w-35 mb-20">
                    <div class="photo">
                        @if($user->photoPath != "")
                            <img src="{{ asset('images/photos/' . $user->photoPath) }}" alt="">
                        @else
                            <img src="{{ asset('images/placeholder.png') }}" alt="">
                        @endif
                        <div class="hover">
                            <label for="photoFile" class="anchor">Alterar foto</label>
                            <input type="file" name="photoFile" id="photoFile" class="show-for-sr file-input">
                            {{ Form::hidden('photoPath') }}
                        </div>
                    </div>
                </div>
                <div class="half ml-20 mb-20 flex al-end">
                    <h3 class="mb-15">{{ Auth::user()->name }}</h3>
                </div>
                <div class="half t-right mb-20 flex al-end jus-end">
                    <a href="{{ route('platform.changePassword') }}" class="button button-border">Alterar Password</a>
                </div>
            </div>
        </div>
    </div>
    <div class="flex dir-row jus-between form">
        <div class="half">
            <div>
                {{ Form::label('Nome', null, ['class' => 'mr-20 ml-10 upper w-25']) }}
                {{ Form::text('name', $user->name, ['class' => 'fw']) }}
            </div>
            <div class='mt-10'>
                {{ Form::label('Idade', null, ['class' => 'mr-20 ml-10 upper w-25']) }}
                {{ Form::text('age', $user->shifter->age, ['class' => 'fw', 'placeholder' => '100']) }}
            </div>
            <div class='mt-10'>
                {{ Form::label('Localidade', null, ['class' => 'mr-20 ml-10 upper w-25']) }}
                {{ Form::text('location', $user->shifter->location, ['class' => 'fw', 'placeholder' => 'Coimbra']) }}
            </div>
            <div class='mt-10'>
                {{ Form::label('Função', null, ['class' => 'mr-20 ml-10 upper w-25']) }}
                {{ Form::select('type', ["" => 'Select option', "Designer" => 'Designer', "Developer" => 'Developer'], Auth::user()->shifter->type, ['class' => 'fw mt-30'])}}
            </div>
        </div>
        <div class="half">
            <div>
                {{ Form::label('Website', null, ['class' => 'mr-20 ml-10 upper w-25']) }}
                {{ Form::text('website', $user->shifter->website, ['class' => 'fw', 'placeholder' => 'www.awesome.com']) }}
            </div>
            <div class='mt-10'>
                {{ Form::label('Twitter', null, ['class' => 'mr-20 ml-10 upper w-25']) }}
                {{ Form::text('twitter', $user->shifter->twitter, ['class' => 'fw', 'placeholder' => '@tweetthisshift']) }}
            </div>
            <div class='mt-10'>
                {{ Form::label('Github', null, ['class' => 'mr-20 ml-10 upper w-25']) }}
                {{ Form::text('github', $user->shifter->github, ['class' => 'fw', 'placeholder' => 'markzuckerberg123']) }}
            </div>

            <div class='mt-10'>
                <label class='mr-20 ml-10 upper fw'>Estudante</label>
                <br>
                @if(isset(Auth::user()->shifter->student))
                    {{ Form::radio('student', 1, Auth::user()->shifter->student == true ? true : false, ['class' => 'dark input-text fw']) }} Sim
                    {{ Form::radio('student', 0, Auth::user()->shifter->student == false ? true : false, ['class' => 'dark input-text fw']) }} Não
                @else
                    {{ Form::radio('student', 1, null, ['class' => 'dark input-text fw']) }} Sim
                    {{ Form::radio('student', 0, null, ['class' => 'dark input-text fw']) }} Não
                @endif
            </div>
        </div>
    </div>
    <div class="student {{ (isset(Auth::user()->shifter->student) && Auth::user()->shifter->student)  ? '' : 'hide' }} flex dir-row wrap jus-between fw mt-10">
        <div class='half mt-20'>
            <label class='mr-20 ml-10 upper w-25'>Universidade</label>
            {{ Form::text('university', Auth::user()->shifter->university, ['placeholder' => 'Universidade de Coimbra', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'dark input-text fw']) }}
        </div>
        <div class='half mt-20'>
            <label class='mr-20 ml-10 upper w-25'>Curso</label>
            {{ Form::text('course', Auth::user()->shifter->course, ['placeholder' => 'Smashing Hackathons 101', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'dark input-text fw']) }}
        </div>
    </div>
    <div class="not-student {{ (isset(Auth::user()->shifter->student) && !Auth::user()->shifter->student) ? '' : 'hide' }} flex dir-row wrap jus-between fw mt-10">
        <div class='half mt-20'>
            <label class='mr-20 ml-10 upper w-25'>Instituição</label>
            {{ Form::text('institution', Auth::user()->shifter->institution, ['placeholder' => 'Best Startup in the World', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'dark input-text fw']) }}
        </div>
        <div class='half mt-20'>
            <label class='mr-20 ml-10 upper w-25'>Role</label>
            {{ Form::text('role', Auth::user()->shifter->role, ['placeholder' => 'UI/UX Ninja Expert', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'dark input-text fw']) }}
        </div>
    </div>
    <div class="flex dir-row form">
        <div class="fw">
            <div class='mt-20'>
                {{ Form::label('bio', 'Bio', ['class' => 'mr-20 ml-10 upper w-25']) }}
                {{ Form::textarea('bio', $user->shifter->bio, ['class' => 'fw mt-10', 'placeholder' => 'Fala nos sobre ti']) }}
            </div>
        </div>
    </div>

    <div class="flex dir-row">
        <div class="fw">
            <div class='mt-10 flex'>
                {{ Form::checkbox('allowPartners', true, $user->shifter->allowPartners)}}
                {{ Form::label('allowPartners', "Aceito disponibilizar os meus dados pessoais aos parceiros oficiais do evento", ['class' => 'two-thirds ml-20 self-center']) }}
            </div>
        </div>
    </div>
    <div class="flex dir-row">
        <div class="fw">
            {{ Form::submit('Actualizar Perfil', ['class' => 'button']) }}
        </div>
    </div>
{{ Form::close() }}

@if (count($errors) > 0)
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
