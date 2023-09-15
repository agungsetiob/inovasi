@extends('layouts.header-quran')

@section('title')
Al-Quran Digital
@endsection

@section('content')

@if (count($errors) > 0)
<div class=" alert alert-danger justify-content-center">
    <div class="col-md-10">
        @foreach ($errors->all() as $error)
        {{$error}}
        @endforeach
    </div>

</div>
@endif
<section>
    <div class="container">
        <div class="row justify-content-center " style="margin-bottom: 3rem;">
            <div class="col-md-10 ">
                <form class="d-flex" action="/surat/cari" method="GET">
                    <input class="form-control me-2" type="text" name="cari" value="{{old('cari')}}" placeholder="Cari Surah">
                    <input type="submit" class="btn btn-outline-success" name="submit" value="Cari">
                </form>
            </div>
        </div>
    </div>

    <div class="container pt-10">
        <div class="row justify-content-center">
            <tr>
                @foreach ($data as $d)
                <td>
                    <div class="card shadow-md m-2" style="width: 18rem;">
                        <div class="card-body">
                            <a href="{{route('detail.surah',$d['nomor'])}}" class="text-decoration-none">{{$d['nomor']}}. {{ $d['nama_latin'] }}</a>
                            <a href="{{route('detail.surah',$d['nomor'])}}" class="text-decoration-none font-arabic">({{ $d['nama'] }})</a>
                            <p>{{$d['arti']}}</p>
                        </div>
                    </div>
                </td>
                @endforeach
        </div>
    </div>
</section>
@endsection