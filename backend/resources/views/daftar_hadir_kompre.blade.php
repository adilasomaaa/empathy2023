<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <title>Daftar Hadir
    </title>
    <style>
        .page_break { 
            /* page-break-before: always; */
            page-break-after: always;
            /* margin-bottom: 50px; */
        }

        *{
            font-family: "Bookman Old Style", serif;
        }

        table{
            /* font-size: 16px; */
            /* font-size: 4.2333mm; */
        }
    </style>
</head>

<body style="padding: 0cm 0cm 0cm 1cm">
    <div class="row">
        <table width= "100%" style="font-size: 14">
            <tr>
                <td width="10%">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/img/cop/logo.png'))) }}" width="100px" height="auto" alt="">
                </td>
                <td align="center" width="auto" style="font-size: 17px;">
                    <p style="font-size: 14">
                    KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI<br>
                    <strong>UNIVERSITAS NEGERI GORONTALO</strong><br>
                    <strong>FAKULTAS SASTRA DAN BUDAYA</strong><br>
                    {{-- <strong>FAKULTAS {{ strtoupper($seminar->seminar_decree->department->faculty->faculty_name) }}</strong><br> --}}
                    @php
                        $alamat = str_replace('Kecamatan', '<br> Kecamatan',$seminar->seminar_decree->department->faculty->address);
                    @endphp
                    {!! $alamat !!}<br>
                    Laman www.ung.ac.id<br>
                    </p>
                </td>
                {{-- <td width= "15%"></td> --}}
            </tr>
        </table>
        <hr style="border: 2px solid black; margin-top: -10px">
        <div class="row" style="font-size: 17px;">
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
            <center>
                <p>
                    <strong>DAFTAR HADIR PENGUJI</strong><br>
                    <strong>UJIAN {{ preg_replace("/UJIAN/","", strtoupper($seminar->registration->registration_periode->stage->stage_name)) }}</strong>
                </p>
            </center>
            
            {{-- <p style="text-align: justify; ">Pada hari ini {{ $hari[date('D', strtotime(now()))] }}, tanggal {{ date('d', strtotime(now()))}}, bulan {{ ucwords(strtolower($bulan[date('n',strtotime(now()))])) }}, tahun {{ date('Y', strtotime(now())) }} Sesuai SK Dekan Nomor {{ $seminar->seminar_decree->decree_number }} tanggal 30 bulan Juni tahun 2022 telah dilaksanakan ujian Komprehensif atas Nama :</p> --}}
        </div>
        <div class="row" style="">
            <table width= "100%" style="font-size: 12">
                <tr>
                    <td width="5%"></td>
                    <td width="20%">Nama</td>
                    <td width="1%">:</td>
                    <td align="left">{{ $seminar->registration->thesis->student->fullname }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>NIM</td>
                    <td>:</td>
                    <td>{{ $seminar->registration->thesis->student->nim }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Program Studi</td>
                    <td>:</td>
                    <td>{{ $seminar->registration->thesis->student->study_program->study_program }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Hari, Tanggal</td>
                    <td>:</td>
                    <td>{{ $hari[date('D', strtotime($seminar->tgl_ujian))] ?? '' }}, {{ date('d', strtotime($seminar->tgl_ujian)) ?? ''}} {{ ucwords(strtolower($bulan[date('n',strtotime($seminar->tgl_ujian))])) ?? '' }} {{ date('Y', strtotime($seminar->tgl_ujian)) ?? '' }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Judul Skripsi</td>
                    <td>:</td>
                    <td>{{ ucwords($seminar->registration->thesis->title) }}</td>
                </tr>
            </table>
            <br>
            <table width= "100%" style="border :1px solid black; border-collapse: collapse;font-size: 12; margin-bottom: 10px">
                <tr style="border :1px solid black; border-collapse: collapse;">
                    <th width="1%" style="border :1px solid black; border-collapse: collapse;">No</th>
                    <th width="60%" style="border :1px solid black; border-collapse: collapse;">Nama Penguji</th>
                    <th width="39%" style="border :1px solid black; border-collapse: collapse;">Tanda Tangan</th>
                </tr>
                @forelse ($seminar->examiner as $key => $item)
                    <tr style="border :1px solid black; border-collapse: collapse;">
                        <td style="border :1px solid black; border-collapse: collapse;padding:10px;">
                            {{ ++$key }}
                        </td>
                        <td style="border :1px solid black; border-collapse: collapse;padding:10px;">
                            {{ $item->personnel->fullname }}
                        </td>
                        <td align="center" style="border :1px solid black; border-collapse: collapse;padding:0px;">
                            <img src="{{ $item->signature }}" width="200px" height="auto" alt="">
                        </td>
                    </tr>
                @empty
                    
                @endforelse
            </table>
            <br>
            <table width="100%" style="font-size: 13; margin-top : NIP 10px" >
                <tr>
                    <td width="55%"></td>
                    <td width="45%"></td>
                </tr>
                <tr>
                    <th align="left"></th>
                    <th align="left">
                        Mengetahui
                    </th>
                </tr>
                <tr>
                    <th align="left">
                        
                    </th>
                    <th align="left">
                        Ketua Jurusan
                    </th>
                </tr>
                <tr>
                    <th align="left">
                        
                    </th>
                    <td style="height: 60px;">
                        <img src="data:image/png;base64, {!! $qrcode !!}">
                    </td>
                </tr>
                <tr>
                    <th align="left"></th>
                    <th align="left">{{ $seminar->registration->thesis->student->study_program->department->department_officer->where('occupation', 'kajur')->first()->personnel->fullname ?? '-'}}</th>
                    
                </tr>
                <tr>
                    
                    <th align="left"></th>
                    <th align="left">NIP {{ $seminar->registration->thesis->student->study_program->department->department_officer->where('occupation', 'kajur')->first()->personnel->nip ?? '-'}}</th>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>

