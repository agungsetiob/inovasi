@extends('layouts.header-quran')

@section('title')
{{$datadetail['nama_latin']}}
@endsection

@section('content')

<section>
    <div class="justify-content-center text-md-center mb-4 font-arabic">
        <h1>{{$datadetail['nama']}}</h1>
    </div>
    <div>
        <ul class="list-inline text-end font-arabic" style="direction: rtl;">
            @foreach($datadetail['ayat'] as $surah)
            <li class="list-inline-item m-3">
                <h4 class="text-wrap"> {{$surah['ar']}} ({{$surah['nomor']}})</h4>
            </li>
            @endforeach
        </ul>
    </div>

</section>
@endsection