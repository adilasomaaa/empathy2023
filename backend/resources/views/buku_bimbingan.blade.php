<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <title>Buku Bimbingan</title>
    <style>
        .page_break { 
            /* page-break-before: always; */
            page-break-after: always;
            /* margin-bottom: 50px; */
        }

        *{
            font-family: "Bookman Old Style", serif;
            font-size: 17px;
        }

        table{
            /* font-size: 16px; */
            /* font-size: 4.2333mm; */
        }
    </style>
</head>

<body style="padding: 0cm 0cm 0cm 1cm">
    <div class="page_break">
        <center>
            <h1 style="font-size: 18">
                BUKU<br>PEMBIMBINGAN SKIPSI<br>MAHASISWA
            </h1>
            <br><br><br><br><br><br><br><br><br><br><br>
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/img/cop/logo.png'))) }}" width="250px" height="auto" alt="">
            <br>
            <br><br><br><br><br><br><br><br>
            <h1 style="font-size: 18">
                JURUSAN {{ strtoupper($thesis->student->study_program->department->department_name) }} <br>
                FAKULTAS SASTRA DAN BUDAYA <br>
                {{-- FAKULTAS {{ strtoupper($thesis->student->study_program->department->faculty->faculty_name) }} <br> --}}
                UNIVERSITAS NEGERI GORONTALO <br>
                {{ date('Y') }}
            </h1>
        </center>
    </div>
    <div class="page_break">
        <div class="row">
            <center>
                <h1 style="font-size: 14; margin-bottom: 10px">
                    BUKU
                </h1>
                <h1 style="font-size: 14; margin-bottom: 10px">
                    PEMBIMBINGAN SKIPSI
                </h1>
                <h1 style="font-size: 14; margin-bottom: 10px">
                MAHASISWA
                </h1>

                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('foto/user/'.$thesis->student->user->foto))) }}" width="113px" height="151px" alt="">
            </center>

            <table style="font-size: 12; margin-top: 20px" width="100%">
                <tr>
                    <th align="left" width="25%">NAMA</th>
                    <th align="left" width="1%">:</th>
                    <th align="left">{{ strtoupper($thesis->student->fullname) }}</th>
                </tr>
                <tr>
                    <th align="left">NIM</th>
                    <th align="left">:</th>
                    <th align="left">{{ strtoupper($thesis->student->nim) }}</th>
                </tr>
                <tr>
                    <th align="left">ANGKATAN</th>
                    <th align="left">:</th>
                    <th align="left">{{ strtoupper($thesis->student->class_year) }}</th>
                </tr>
                <tr>
                    <th align="left">PROGRAM STUDI</th>
                    <th align="left">:</th>
                    <th align="left">{{ strtoupper($thesis->student->study_program->study_program) }}</th>
                </tr>
                <tr>
                    <th align="left">JURUSAN</th>
                    <th align="left">:</th>
                    <th align="left">{{ strtoupper($thesis->student->study_program->department->department_name) }}</th>
                </tr>
                <tr>
                    <th align="left">FAKULTAS</th>
                    <th align="left">:</th>
                    <th align="left">{{ strtoupper($thesis->student->study_program->department->faculty->faculty_name) }}</th>
                </tr>
                <tr>
                    <th align="left">JUDUL SKRIPSI</th>
                    <th align="left">:</th>
                    <th align="left">{{ strtoupper($thesis->title) }}</th>
                </tr>
            </table>
            <table style="font-size: 12; margin: 20px 0 5px 0">
                <tr>
                    <th align="left">DOSEN PEMBIMBING</th>
                    <th align="left"></th>
                    <th align="left"></th>
                </tr>
            </table>
            <table style="font-size: 12;" width="100%">
                @forelse ($thesis->thesis_guide as $key => $dosen)
                    <tr>
                        <th align="left" width="25%">Pembimbing {{ ++$key }}</th>
                        <th align="left" width="2%">:</th>
                        <th align="left">{{ $dosen->personnel->fullname }}</th>
                    </tr>
                @empty
                    
                @endforelse
                
            </table>
            <table style="font-size: 12; margin: 20px 0 5px 0">
                <tr>
                    <th align="left">LAMA PEMBIMBINGAN</th>
                    <th align="left"></th>
                    <th align="left"></th>
                </tr>
            </table>
            <table style="font-size: 12;" width="100%">
                @forelse ($thesis->thesis_guide as $key => $dosen)
                    <tr>
                        <th align="left" width="25%">Pembimbing {{ ++$key }}</th>
                        <th align="left" width="2%">:</th>
                        <th align="left">...bulan</th>
                    </tr>
                @empty
                    
                @endforelse
                
            </table>
            @php
                $bulan = array (1 =>   'JANUARI',
                    'FEBRUARI',
                    'MARET',
                    'APRIL',
                    'MEI',
                    'JUNI',
                    'JULI',
                    'AGUSTUS',
                    'SEPTEMBER',
                    'OKTOBER',
                    'NOVEMBER',
                    'DESEMBER'
                );
                $hari = array('Sun' => 'Minggu','Mon' => 'Senin','Tue' => 'Selasa','Wed' => 'Rabu','Thu' => 'Kamis','Fri' => 'Jumat','Sat' => 'Sabtu');
            @endphp 
        </div>
        <div class="row">
            <div>
                <table width="100%" style="font-size: 12; margin-top : 20px" >
                    <tr>
                        <td width="60%"></td>
                        <td width="40%"></td>
                    </tr>
                    <tr>
                        <th align="left">Mengetahui</th>
                        <th align="left">Gorontalo, {{ date('d-m-Y') }}
                            {{-- {{ date('d', strtotime(now())).' '.ucwords(strtolower($bulan[date('n',strtotime(now()))])).' '.date('Y', strtotime(now())) }} --}}
                        </th>
                    </tr>
                    <tr>
                        <th align="left">
                            Ketua Prodi
                        </th>
                        <th align="left">
                            Mahasiswa
                        </th>
                    </tr>
                    <tr>
                        <td colspan="2" style="height: 60px;"></td>
                    </tr>
                    <tr>
                        <th align="left">({{ $thesis->student->study_program->department->department_officer->where('occupation', 'kaprodi')->first()->personnel->fullname ?? '-' }})</th>
                        <th align="left">({{ $thesis->student->fullname ?? '-'}})</th>
                    </tr>
                    <tr>
                        <th align="left">({{ $thesis->student->study_program->department->department_officer->where('occupation', 'kaprodi')->first()->personnel->nip  ?? '-'}})</th>
                        <th align="left">({{ $thesis->student->nim ?? '-' }})</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="row" style="font-size: 12;">
        @forelse ($thesis->thesis_consulting->where('status', 'bimbingan') as $item)
            <p style="font-size: 12;">
                Hari & Tanggal Penyerahan Oleh Mahasiswa : <strong>{{ $hari[date('D', strtotime($item->created_at))] }}, {{ date('d',strtotime($item->created_at)) }} {{ ucwords(strtolower($bulan[date('n',strtotime($item->created_at))])) }} {{ date('Y',strtotime($item->created_at)) }}</strong> <br>
                Dosen Pembimbing : <strong>{{ $item->personnel->fullname }}</strong>
            </p>
            <table width= "100%" style="border :1px solid black; border-collapse: collapse;font-size: 12; margin-bottom: 10px">
                <tr style="border :1px solid black; border-collapse: collapse;">
                    <th width="50%" style="border :1px solid black; border-collapse: collapse;">Materi dan Saran Pembimbing</th>
                    <th width="20%" style="border :1px solid black; border-collapse: collapse;">Paraf Desen</th>
                    <th width="30%" style="border :1px solid black; border-collapse: collapse;">Tanggal Pengembalian Dari Pembimbing</th>
                </tr>
                <tr style="border :1px solid black; border-collapse: collapse;">
                    <td width="50%" style="border :1px solid black; border-collapse: collapse;padding:6px;">
                        <strong>{{ ucwords($item->topic) }}</strong><br>
                        {!! nl2br($item->conclusion) !!}
                        {{-- @php
                            nl2br(ucwords($item->conclusion))
                        @endphp --}}
                    </td>
                    <td width="20%" style="border :1px solid black; border-collapse: collapse;padding:6px;">
                        <img src="{{ $item->signature }}" width="200px" height="auto" alt="">
                    </td>
                    <td width="30%" style="border :1px solid black; border-collapse: collapse;padding:6px;">
                        {{ $hari[date('D', strtotime($item->finished_at))] }}, {{ date('d',strtotime($item->finished_at)) }} {{ ucwords(strtolower($bulan[date('n',strtotime($item->finished_at))])) }} {{ date('Y',strtotime($item->finished_at)) }}
                    </td>
                </tr>
            </table>
        @empty
            
        @endforelse

        
    </div>
    





    
</body>

</html>

