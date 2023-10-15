@extends('layouts.header-quran')


@section('content')
<section>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <form class="d-flex" action="/surat/cari" method="GET">
                    <input class="form-control me-2" type="text" name="cari" placeholder="Cari Surah" value="{{old('cari')}}">
                    <input type="submit" class="btn btn-outline-success" value="Cari">
                </form>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        {{$error}}
        @endforeach
    </div>
    @endif


    <div class="container">
        <div class="row justify-content-center">
            @if(count($find)>0)
            <tr>
                @foreach($find as $f)
                <td>
                    <div class="card shadow-md m-2" style="width: 18rem;">
                        <div class="card-body">
                            <a href="{{route('detail.surah',$f['nomor'])}}" class="text-decoration-none">{{$f['nama']}}</a>
                            <p>{{$f['arti']}}</p>
                        </div>
                    </div>
                </td>
                @endforeach
            </tr>
            @else

            <p class="text-center justify-content-center alert alert-danger">Maaf surah yang anda cari tidak ditemukan</p>
            @endif
        </div>
    </div>
</section>

@endsection