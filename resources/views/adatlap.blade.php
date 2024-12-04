    @extends('layout')
    @section('content')
    <div class="container py-3 fs-5">
        <h1 class="text-center display-5">{{ $result->nev }}</h1>
        <p>{{ $result->feltet }}</p>
        @if ($result->akcios == 1 )
            <p><b>Ez a pizza a készlet erejéig akciós! - mínusz 10%</b></p>
        @else
            <p><b>Ez a pizza nem akciós, lehet, hogy a jövő héten az lesz.</b></p>
        @endif
        <p>Árak:</p>
        <ul>
            <li>24 cm: @if ($result->akcios == 1)
            <s>{{ $result->ar }} Ft</s> helyett <span class="text-danger"><b>{{$result->ar*0.9 }} Ft</b></span>
            @else
            {{ $result->ar }} Ft
            @endif</li>
            <li>32 cm: @if ($result->akcios == 1)
            <s>{{ $result->ar*1.25 }} Ft</s> helyett <span class="text-danger"><b>{{$result->ar*1.25*0.9 }} Ft</b></span>
            @else
            {{ $result->ar*1.25 }} Ft
            @endif</li>
            <li>45 cm: @if ($result->akcios == 1)
            <s>{{ $result->ar*1.50 }} Ft</s> helyett <span class="text-danger"><b>{{$result->ar*1.50*0.9 }} Ft</b></span>
            @else
            {{ $result->ar*1.50 }} Ft
            @endif</li>
        </ul>
    </div>
    @endsection
