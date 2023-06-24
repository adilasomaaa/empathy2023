<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <title>Undangan Seminar</title>
    <style>
        .page_break { 
            page-break-before: always;
            margin-bottom: 50px;
        }

        *{
            /* font-family: "Bookman Old Style", serif; */
            font-size: 16px;
        }

        .kop-surat p{
            /* font-size:20px; */
            /* font-style: italic; */
        }

        table{
            /* font-size: 16px; */
            /* font-size: 4.2333mm; */
        }

        .body{
            text-indent: 30px;
            text-align:justify;
        }
        .table-keterangan{
            position: relative;
            margin-left:30%;
        }

        .tanda-tangan{
            position: relative;
            margin-left:50%;
        }
    </style>
</head>

<body>
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
    <div class="" style="padding: 0cm 0cm 0cm 1cm">
        <table width= "100%">
            <tr>
                <td width= "15%">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/img/cop/logo.png'))) }}" width="100px" height="auto" alt="">
                </td>
                <td align="center" width="75%" style="font-size: 17px;">
                    <div class="kop-surat">
                        <p style="font-size: 17px">
                        KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI<br>
                        <b>UNIVERSITAS NEGERI GORONTALO</b><br>
                        <b>FAKULTAS SASTRA DAN BUDAYA</b><br>
                        Jalan Prof. Dr. Ing. B.J. Habibie, Desa Moutong, <br>
                        Kecamatan Tilongkabila, Kabupaten Bone Bolango<br>
                        Laman www.ung.ac.id<br>
                        </p>
                    </div>
                </td>
                <td width="auto">
                </td>
            </tr>
        </table>
        <hr style="border: 2px solid black; margin-top: -10px">
        <div class="row">
            <table class="table" style="width:100%">
                <tr>
                    <td>Nomor</td>
                    <td>:</td>
                    <td>{{$seminar_decree->invitation_letter_number}} </td>
                    <td style="text-align:right" colspan="2"> {{ date('d', strtotime($seminar_decree->invitation_letter_date))}} - {{ ucwords(strtolower($bulan[date('n',strtotime($seminar_decree->invitation_letter_date))])) }} - {{ date('Y', strtotime($seminar_decree->invitation_letter_date)) }}</td>
                </tr>
                <tr>
                    <td>Lamp.</td>
                    <td>:</td>
                    <td>Dua Berkas</td>
                </tr>
                <tr>
                    <td>Hal</td>
                    <td>:</td>
                    <td>Undangan</td>
                </tr>
            </table>
        </div>
        <div class="row">
            <p>
                <b>
                Yth. Penguji dan Peserta {{ ucwords($seminar->registration->registration_periode->stage->stage_name) }} Skripsi <br/>
                Program S1 Prodi {{ ucwords($seminar->registration->thesis->student->study_program->study_program) }}
                </b>
            </p>
        </div>
        <div class="row">
            <p class="body">
                Sehubungan dengan pelaksanaan {{ ucwords($seminar->registration->registration_periode->stage->stage_name) }} Skripsi, dengan ini kami mengundang Bapak dan Ibu
                untuk menguji mahasiswa peserta ujian {{ ucwords($seminar->registration->registration_periode->stage->stage_name) }} skripsi Program S1 Program Studi {{ ucwords($seminar->registration->thesis->student->study_program->study_program) }} (SK dan Jadwal terlampir). Kegiatan dimaksud akan dilaksanakan dengan ketentuan
                sebagai berikut.

            </p>
        </div>
        <div class="table-keterangan">
            <table class="table">
                <tr>
                    <td style="width:125px">Hari Tanggal</td>
                    <td>:</td>
                    <td>{{ $hari[date('D', strtotime($seminar->tgl_ujian))]}}, {{ date('d', strtotime($seminar->tgl_ujian))}} - {{ ucwords(strtolower($bulan[date('n',strtotime($seminar->tgl_ujian))])) }} - {{ date('Y', strtotime($seminar->tgl_ujian)) }}</td>
                </tr>
                <tr>
                    <td style="width:125px">Waktu</td>
                    <td>:</td>
                    <td>Pukul {{date('H:i', strtotime($seminar->waktu_mulai))}} s/d {{date('H:i', strtotime($seminar->waktu_selesai))}} WITA</td>
                </tr>
                <tr>
                    <td style="width:125px">Tempat</td>
                    <td>:</td>
                    <td> {{ ucwords($seminar->tempat) }} </td>
                </tr>
            </table>
        </div>
        <div class="row">
            <p>
            Demikian undangan ini, atas kehadiran Bapak dan Ibu tepat waktu disampaikan terima kasih. 
            </p>
        </div>

        <div class="row">
            <table width="100%" style="font-size: 13; margin-top : NIP 10px" >
                <tr>
                    <td width="50%"></td>
                    <td width="50%"></td>
                </tr>
                <tr>
                    <th align="left">
                        
                    </th>
                    <td align="left">
                        Ketua Jurusan
                    </td>
                </tr>
                <tr>
                    <th align="left">
                    </th>
                    <td style="height: 60px;">
                        @if (Request::segment(3) == 'show')
                            {!! $qrcode !!}
                        @else
                            <img src="data:image/png;base64, {!! $qrcode !!}">
                        @endif
                    </td>
                </tr>
                <tr>
                    <th align="left"></th>
                    <td align="left">{{ $seminar->registration->thesis->student->study_program->department->department_officer->where('occupation', 'kajur')->first()->personnel->fullname ?? '-'}}</td>
                    
                </tr>
                <tr>
                    
                    <th align="left"></th>
                    <td align="left">NIP {{ $seminar->registration->thesis->student->study_program->department->department_officer->where('occupation', 'kajur')->first()->personnel->nip ?? '-'}}</td>
                </tr>
            </table>
        </div>

    </div>
</body>

</html>

