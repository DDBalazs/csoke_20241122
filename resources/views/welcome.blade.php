    @extends('layout')
    @section('content')
    <div class="container py-3 fs-5">
        <h1 class="text-center display-5">Akciós pizzák</h1>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
            @foreach ($result as $row)
                <div class="col">
                    <h2><a href="/adatlap/{{ $row->id }}">{{ $row->nev }}</a></h2>
                    <p>{{ $row->feltet }}</p>
                    <p>
                        <b>Akciós ár (24 cm):</b><br>
                        <s>{{ $row->ar }} Ft</s> helyett
                        <span class="text-danger fw-bold">{{ $row->ar * 0.9 }} Ft</span>
                    </p>
                    <p class="text-end"><a href="/adatlap/{{ $row->id }}">További méretek</a></p>
                    <hr>
                </div>
            @endforeach
        </div>
    </div>
    @endsection
