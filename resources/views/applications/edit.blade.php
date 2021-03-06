@extends('layouts.platform')

@section('content')
    <div class="candidatura">
        <h3 class='asap blue upper'>Candidatura</h3>
        <div id="tabs">
            <nav class='mt-50 mb-75 flex dir-row jus-between al-center'>
                <a href="#bio" class='quarter tab-title'><button class='fw button button-border selected'>Bio</button></a>
                &#10095;
                <a href="#pitch" class='quarter tab-title'><button class='fw button button-border'>Skills + Pitch</button></a>
                &#10095;
                <a href="#extras" class='quarter tab-title'><button class='fw button button-border'>Extras</button></a>
            </nav>

            {{ Form::open(['url' => ['platform/applications', 'application' => $application], "enctype" => "multipart/form-data", 'method' => 'put']) }}
                <div id="bio" class="tab-content mt-20 flex dir-row wrap jus-between selected">
                    <div class="general flex dir-row wrap jus-between fw mb-30">
                        <h5 class='dark upper fw mb-50'>Passo 1 - Confirma os teus dados</h5><br>
                        <div class='fw'>
                            <label class='mr-20 ml-10 upper fw'>nome *</label>
                            {{ Form::text('name', Auth::user()->name, ['placeholder' => 'Tigre Leopardo', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'dark input-text fw']) }}
                        </div>
                        <div class='half'>
                            <label class='mr-20 ml-10 upper fw'>idade *</label>
                            {{ Form::text('age', Auth::user()->shifter->age, ['placeholder' => '100', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'dark input-text fw']) }}
                        </div>
                        <div class='half mt-10'>
                            <label class='mr-20 ml-10 upper fw'>localidade *</label>
                            {{ Form::text('location', Auth::user()->shifter->location, ['placeholder' => 'Coimbra', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'dark input-text fw']) }}
                        </div>
                        <div class='half mt-10'>
                            <label class='mr-20 ml-10 upper fw'>fun????o *</label>
                            {{ Form::select('type', ["" => 'Select option', "Designer" => 'Designer', "Developer" => 'Developer'], Auth::user()->shifter->type, ['class' => 'fw mt-20'])}}
                        </div>
                        <div class='half mt-10'>
                            <label class='mr-20 ml-10 upper fw'>estudante *</label>
                            @if(isset(Auth::user()->shifter->student))
                                {{ Form::radio('student', 1, Auth::user()->shifter->student == true ? true : false, ['class' => 'dark input-text fw']) }} Sim
                                {{ Form::radio('student', 0, Auth::user()->shifter->student == false ? true : false, ['class' => 'dark input-text fw']) }} N??o
                            @else
                                {{ Form::radio('student', 1, null, ['class' => 'dark input-text fw']) }} Sim
                                {{ Form::radio('student', 0, null, ['class' => 'dark input-text fw']) }} N??o
                            @endif
                        </div>
                    </div>
                    <div class="student {{ (isset(Auth::user()->shifter->student) && Auth::user()->shifter->student)  ? '' : 'hide' }} flex dir-row wrap jus-between fw mt-10">
                        <div class='half'>
                            <label class='mr-20 ml-10 upper fw'>Universidade *</label>
                            {{ Form::text('university', Auth::user()->shifter->university, ['placeholder' => 'Universidade de Coimbra', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'dark input-text fw']) }}
                        </div>
                        <div class='half'>
                            <label class='mr-20 ml-10 upper fw'>Curso *</label>
                            {{ Form::text('course', Auth::user()->shifter->course, ['placeholder' => 'Smashing Hackathons 101', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'dark input-text fw']) }}
                        </div>
                    </div>
                    <div class="not-student {{ (isset(Auth::user()->shifter->student) && !Auth::user()->shifter->student) ? '' : 'hide' }} flex dir-row wrap jus-between fw mt-10">
                        <div class='half'>
                            <label class='mr-20 ml-10 upper fw'>Institui????o *</label>
                            {{ Form::text('institution', Auth::user()->shifter->institution, ['placeholder' => 'Best Startup in the World', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'dark input-text fw']) }}
                        </div>
                        <div class='half'>
                            <label class='mr-20 ml-10 upper fw'>Role *</label>
                            {{ Form::text('role', Auth::user()->shifter->role, ['placeholder' => 'UI/UX Ninja Expert', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'dark input-text fw']) }}
                        </div>
                    </div>
                    <div class='fw mt-10'>
                        <label class='mr-20 ml-10 upper fw'>Bio *</label>
                        {{ Form::textarea('bio', Auth::user()->shifter->bio, ['placeholder' => 'Fala nos sobre ti', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'dark input-text fw']) }}
                    </div>
                </div>
                <div id="pitch" class="tab-content mt-20 flex dir-row wrap jus-between">
                    <h5 class='dark upper fw mb-50'>Passo 2 - Mostra-nos que ??s um verdadeiro shifter</h5><br>
                    <div class='fw'>
                        <label class='mr-20 ml-10 upper fw'>Pitch *</label>
                        {{ Form::textarea('pitch', $application->pitch, ['placeholder' => 'D??-lhe tudo o que tens', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'dark input-text fw']) }}
                    </div>
                    <div class='fw mt-10'>
                        <label class='mr-20 ml-10 upper fw'>Skills *</label>
                        {{ Form::textarea('skills', $application->skills, ['placeholder' => 'Coloca as tuas skills sob a forma de hashtag, por exemplo: #PHP #React #Rails', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'dark input-text fw']) }}
                    </div>
                </div>
                <div id="extras" class="tab-content mt-20 flex dir-row wrap jus-between">
                    <h5 class='dark upper fw mb-50'>Passo 3 - Conta-nos mais sobre ti!</h5><br>
                    <div class='half'>
                        <label class='mr-20 ml-10 mb-10 upper fw'>T-shirt *</label>
                        {{ Form::select('tshirt', ["" => 'Select option', "S" => 'S', "M" => 'M', "L" => 'L', "XL" => 'XL', "XXL" => 'XXL'], $application->tshirt, ['class' => 'fw mt-20'])}}
                    </div>
                    <div class='half'>
                        <label class='mr-20 ml-10 mb-20 upper fw'>Primeira vez no Shift? *</label>
                        {{ Form::radio('firstTime', 1, $application->firstTime ? true : false, ['class' => 'dark input-text fw']) }} Sim
                        {{ Form::radio('firstTime', 0, $application->firstTime ? false : true, ['class' => 'dark input-text fw']) }} N??o
                    </div>
                    <div class='half mt-40'>
                        <label class='mr-20 ml-10 upper fw'>Twitter</label>
                        {{ Form::text('twitter', Auth::user()->shifter->twitter, ['placeholder' => '@tweetthisshift', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'dark input-text fw']) }}
                    </div>
                    <div class='half mt-40'>
                        <label class='mr-20 ml-10 upper fw'>Github</label>
                        {{ Form::text('github', Auth::user()->shifter->github, ['placeholder' => 'markzuckerberg123', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'dark input-text fw']) }}
                    </div>
                    <div class='half mt-20'>
                        <label class='mr-20 ml-10 upper fw'>Website</label>

                        {{ Form::text('website', Auth::user()->shifter->website, ['placeholder' => 'www.aweseome.com', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'dark input-text fw']) }}
                    </div>
                    <div class='half mt-20'>
                        <label class='mr-20 ml-10 upper fw'>Portfolio</label>
                        {{ Form::text('portefolio', $application->portefolio, ['placeholder' => 'www.bestportefolioever.com', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'dark input-text fw']) }}
                    </div>
                    <div class='fw mt-20'>
                        <label class='mr-20 ml-10 upper fw'>URLs ??teis</label>
                        {{ Form::textarea('urls', $application->urls, ['placeholder' => 'Coloca aqui outro tipo de URLs que acredites que s??o importantes para ajudar na selec????o da tua candidatura', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'dark input-text fw']) }}
                    </div>
                    <div class='fw mt-20'>
                        <label class='mr-20 ml-10 upper fw'>Coment??rios</label>
                        {{ Form::textarea('comments', $application->comments, ['placeholder' => 'Podes utilizar este campo para dizeres um pouco de tudo, se tens algum tipo de restri????o alimentar ou algo que aches relevante a organiza????o estar a par', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'dark input-text fw']) }}
                    </div>
                    <div class="fw flex dir-row jus-end">
                        <button type="submit" class='button self-end mt-40'>submeter</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="flex dir-row mt-20 mb-20">
            <div class="fw">
                * campos obrigat??rios
            </div>
        </div>

        @if (count($errors) > 0)
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

@endsection
