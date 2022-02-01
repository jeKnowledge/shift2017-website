@extends('layouts.platform')

@section('content')

    <h3 class="blue upper">Shifters</h3>
    <div class="flex wrap jus-begin">
        @foreach($shifters as $shifter)
            @if($shifter->user->id != Auth::user()->id)
                @if((Auth::user()->isGoldPartner() && $shifter->allowPartners) || (Auth::user()->isGoldPartner() == false))
                    <div class="shifter flex dir-column mr-40 mb-20">
                        <div class="flex photo">
                            <img src="{{ isset($shifter->user->photoPath) != "" ? asset('images/photos/' . $shifter->user->photoPath) : asset('images/placeholder.png')}}" alt="">
                            <div class="hover">
                                <a class="anchor" href="{{ route('shifters.show', ['shifter' => $shifter->id])}}">Ver Perfil</a>
                            </div>
                        </div>
                        <div class="flex jus-center t-center">
                            {{ $shifter->user->name }}
                        </div>
                    </div>
                @endif
            @endif
        @endforeach
    </div>
@endsection
