<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <title>Catatan Ujian
    </title>
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

    @forelse ($seminar->examiner->where('personnel_id',  $personnel->id) as $penguji)
    <div class="page_break">
        <div class="row">
            <table width= "100%">
                <tr>
                    <td width= "10%">
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/img/cop/logo.png'))) }}" width="100px" height="auto" alt="">
                    </td>
                    <td align="center" width="auto" style="font-size: 17px;">
                        <p>
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
                    <td width= "15%"></td>
                </tr>
            </table>
            <hr style="border: 2px solid black; margin-top: -10px">
            <div class="row" style="font-size: 17px;">
                @php
                    $bulan = array (1 =>   
                        'JANUARI',
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
                        <strong>LEMBAR PENILAIAN</strong><br>
                        <strong>{{ strtoupper($seminar->registration->registration_period->stage->stage_name) }}</strong>
                    </p>
                    {{-- <span style="margin-top: 30px">
                            TENTANG<br>PENETAPAN MAHASISWA PROGRAM S1 BAGI MAHASISWA JALUR SKRIPSI PROGRAM STUDI PENDIDIKAN BAHASA DAN SASTRA INDONESIA DAN PENUNJUKAN DOSEN PEMBIMBING SKRIPSI FAKULTAS {{ strtoupper($seminar->seminar_decree->department->faculty->faculty_name) }} UNIVERSITAS NEGERI GORONTALO
                    </span> --}}
                </center>
                
                {{-- <p>Pada hari ini {{ $hari[date('D', strtotime(now()))] }}, tanggal {{ date('d', strtotime(now()))}}, bulan {{ ucwords(strtolower($bulan[date('n',strtotime(now()))])) }}, tahun {{ date('Y', strtotime(now())) }} Sesuai SK Dekan Nomor {{ $seminar->seminar_decree->decree_number }} tanggal 30 bulan Juni tahun 2022 telah dilaksanakan ujian Komprehensif atas Nama :</p> --}}
            </div>
            
            <div class="row" style="">
                
                <table width= "100%">
                    <tr>
                        <td colspan="2" style="height: 15px"></td>
                    </tr>
                    <tr>
                        <td width="25%">Nama</td>
                        <td width="1%">:</td>
                        <td align="left">{{ $seminar->registration->thesis->student->fullname }}</td>
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td>{{ $seminar->registration->thesis->student->nim }}</td>
                    </tr>
                    <tr>
                        <td>Program Studi</td>
                        <td>:</td>
                        <td>{{ $seminar->registration->thesis->student->study_program->study_program }}</td>
                    </tr>
                    <tr>
                        <td valign="top">Judul Skripsi</td>
                        <td valign="top">:</td>
                        <td>{{ $seminar->registration->thesis->title }}</td>
                    </tr>
                    @forelse ($seminar->registration->thesis->thesis_guide as $key => $item)
                        @php
                            ++$key;
                        @endphp
                        <tr>

                            <td>{{ $key <= 1 ? 'Dosen Pembimbing' : ' '}}</td>
                            <td>{{ $key <= 1 ? ':' : ' '}}</td>
                            <td>({{ $key }}) {{ $item->personnel->fullname }}</td>
                        </tr>
                    @empty
                    @endforelse
                </table>
            </div>
            <br>
            <p>
                Dengan hasil penilaian sebagai berikut : 
            </p>
            <table width="100%" style="border-collapse: collapse; border: 1px solid black; font-size: 10px" >

                <tr>
                    <th style="border: 1px solid black" width="5%">No</th>
                    <th style="border: 1px solid black" width="30%">Penilaian</th>
                    <th style="border: 1px solid black" width="65%">Revisi</th>
                </tr>

                @forelse ($seminar->registration->registration_period->annotation_template->annotation_list as $key => $list)
                    <tr>
                        <td style="border: 1px solid black" align="center" width="5%">{{ ++$key }}</td>
                        <td style="border: 1px solid black; padding : 10px" width="30%">{{ $list->aspect }}</td>
                        <td style="border: 1px solid black; padding : 10px" width="65%">{{ $penguji->annotation->where('annotation_list_id', $list->id)->first()->annotation ?? '' }}</td>
                    </tr>
                @empty

                @endforelse

            </table>
        </div>
        <div class="row" style="margin-top: 20px">
            
            <table width= "100%">
                <tr>
                    <td width="60%"></td>
                    <td width="40%">Dosen Penguji,</td>
                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 40px">
            <table width= "100%">
                <tr>
                    <td width="60%"></td>
                    <td width="40%">
                        <img src="{{ $penguji->signature }}" width="200px" height="auto" alt="">
                    </td>
                </tr>
            </table>
        </div>
        <div class="row">
            <table width= "100%">
                <tr>
                    <td width="60%"></td>
                    <td width="40%">{{ $penguji->personnel->fullname ?? '-' }}</td>
                </tr>
                <tr>
                    <td width="60%"></td>
                    <td width="40%">NIP. {{ $penguji->personnel->nip ?? '-' }}</td>
                </tr>
            </table>
        </div>
    </div>
        {{-- <div class="page_break"></div> --}}
    @empty
        
    @endforelse
</body>

</html>

