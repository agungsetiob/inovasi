<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Pengaduan Masyarakat</title>
    {{-- <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    <style>
        body {
            font-family: Tahoma, "Trebuchet MS", sans-serif;
            /* background: rgb(103, 100, 100); */
        }

        .text-center {
            text-align: center !important;
        }

        .align-middle {
            vertical-align: middle !important;
        }

        .text-start {
            text-align: left !important
        }

        .fs-20 {
            font-size: 23px;
        }

        .fs-18 {
            font-size: 21px;
        }

        .fs-16 {
            font-size: 18px;
        }

        .fs-14 {
            font-size: 14px;
        }

        .fs-12 {
            font-size: 12px;
        }

        .fs-10 {
            font-size: 10px;
        }

        .bold {
            font-weight: bold;
        }

        .text-end {
            text-align: right !important
        }

        .d-flex {
            display: flex !important
        }

        .justify-content-start {
            justify-content: flex-start !important
        }

        .justify-content-end {
            justify-content: flex-end !important
        }

        .justify-content-center {
            justify-content: center !important
        }

        .justify-content-between {
            justify-content: space-between !important
        }

        .justify-content-around {
            justify-content: space-around !important
        }

        .justify-content-evenly {
            justify-content: space-evenly !important
        }

        .w-100 {
            width: 100% !important
        }

        .text-uppercase {
            text-transform: uppercase !important;
        }


        table.border,
        table.border tr,
        table.border td,
        table.border th {
            border: 1px solid black;
            border-collapse: collapse !important;
            padding: 5px 4px;
        }

        table.no-border,
        table.no-border tr,
        table.no-border td,
        table.no-border th {
            padding: 5px 4px;
        }
    </style>
    <style>
        /**
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
        @page {
            /* margin: 0cm 0cm; */
            margin-top: 1cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 0cm;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

        }

        main {
            position: fixed;
            top: 3.7cm;
            left: 0cm;
            right: 0cm;

        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
        }
    </style>
</head>

<body>
    <header>
        <table class="w-100">
            <tbody>
                <tr>
                    <td class="text-center">
                        <img src="{{ realpath('img/logo.png') }}" alt="Kop Header" width="70px">
                    </td>
                    <td class="text-center" style="padding-top: 0px; padding-bottom: 0px">
                        <span style="font-size: 14px"><b>PEMERINTAH KABUPATEN TANAH BUMBU <br></b></span>
                        <span style="font-size: 18px"><b>Badan Perencanaan Daerah Penelitian dan Pengembangan <br></b></span>
                        <span style="font-size: 9px">Jl. H. M. Amin KM.10 RT 03 Desa Sepunggur Kec. Kusan Tengah Kab. Tanah Bumbu
                        Prov. Kalimantan Selatan KP. 72273 Email: bappedalitbang@tanahbumbukab.go.id
                        Telepon 0811 5040 540 / (0518) 6070 767
                        <br></span>
                    </td>
                </tr>
            </tbody>
        </table>
        <hr>
    </header>

    <main>
        <table class="border w-100">
            <thead>
                <tr>
                    <th class="text-center text-uppercase" style="width: 2%">No</th>
                    <th class="text-center text-uppercase" style="width: 11%">Nama</th>
                    <th class="text-center text-uppercase" style="width: 20%">Keluhan</th>
                    <th class="text-center text-uppercase" style="width: 11%">Tanggal</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($pengaduan as $item)
                  <tr>
                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                    <td class="text-center align-middle">{{ $item->name }}</td>
                    <td class="text-center align-middle">{{ $item->complain }}</td>
                    <td class="text-center align-middle">{{ $item->created_at->isoFormat('D MMMM Y') }}</td>
                  </tr>
              @endforeach
            </tbody>
        </table>
        <table class="border w-100">
            <thead>
                <tr>
                    <th class="text-center text-uppercase" style="width: 2%">No</th>
                    <th class="text-center text-uppercase" style="width: 11%">Indikator</th>
                    <th class="text-center text-uppercase" style="width: 20%">Informasi</th>
                    <th class="text-center text-uppercase" style="width: 11%">Bukti Dukung</th>
                </tr>
            </thead>
            <tbody>
                  <tr>
                    <td class="text-center align-middle">{{ 1 }}</td>
                    <td class="text-center align-middle">Regulasi Inovasi Daerah*</td>
                    <td class="text-center align-middle">{{ $total }}</td>
                    <td class="text-center align-middle">{{ $total }}</td>
                  </tr>
                  <tr>
                    <td class="text-center align-middle">{{ 2 }}</td>
                    <td class="text-center align-middle">Ketersediaan SDM Terhadap Inovasi Daerah *</td>
                    <td class="text-center align-middle">{{ $total }}</td>
                    <td class="text-center align-middle">{{ $total }}</td>
                  </tr>
            </tbody>
        </table>
    </main>
</body>

</html>
