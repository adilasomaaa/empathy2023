<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <title>BERITA ACARA</title>
    <style>
        .page_break { 
            /* page-break-before: always; */
            page-break-after: always;
            /* margin-bottom: 50px; */
        }

        *{
            font-family: "Bookman Old Style", serif;
            font-size: 15px;
        }

        table{
            /* font-size: 16px; */
            /* font-size: 4.2333mm; */
        }
    </style>
</head>

<body style="padding: 0cm 0cm 0cm 1cm">
    <div class="row">
        <table width= "100%">
            <tr>
                <td width= "10%">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/img/cop/logo.png'))) }}" width="100px" height="auto" alt="">
                </td>
                <td align="center" width="auto" style="font-size: 17px;">
                    <p>
                    KEMENTERIAN PENDIDIKAN, KEBUDAYAAN,<br>
                    RISET, DAN TEKNOLOGI<br>
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
        <div class="row">
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
                    <strong>BERITA ACARA</strong>
                    <br> Nomor : 
                    {{-- {{ $seminar->seminar_decree->decree_number }}  --}}
                    
                    {{ $seminar->registration->thesis->student->bachelor_degree->no_berita_acara ?? 'Belum tergabung dalam SK'}}
                </p>
                {{-- <span style="margin-top: 30px">
                        TENTANG<br>PENETAPAN MAHASISWA PROGRAM S1 BAGI MAHASISWA JALUR SKRIPSI PROGRAM STUDI PENDIDIKAN BAHASA DAN SASTRA INDONESIA DAN PENUNJUKAN DOSEN PEMBIMBING SKRIPSI FAKULTAS {{ strtoupper($seminar->seminar_decree->department->faculty->faculty_name) }} UNIVERSITAS NEGERI GORONTALO
                </span> --}}
            </center>

            <p>Pada hari ini {{ $hari[date('D', strtotime($seminar->tgl_ujian))] }}, tanggal {{ date('d', strtotime($seminar->tgl_ujian))}}, bulan {{ ucwords(strtolower($bulan[date('n',strtotime($seminar->tgl_ujian))])) }}, tahun {{ date('Y', strtotime($seminar->tgl_ujian)) }} kami masing-masing</p>
        </div>
        <div class="row" style="margin-top: 20px">
            
            <table width= "100%">
                @if ($status == 2)
                    <tr>
                        <td width="5%">1</td>
                        <td width="20%">Nama</td>
                        <td width="1%">:</td>
                        <td width="auto">{{ $seminar->examiner->where('order', 0)->first()->personnel->fullname}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>NIP</td>
                        <td>:</td>
                        <td>{{ $seminar->examiner->where('order', 0)->first()->personnel->nip}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>Ketua Tim Penguji</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="3">Selanjutnya disebut pihak pertama.</td>
                    </tr>
                @else
                    <tr>
                        <td width="5%">1</td>
                        <td width="20%">Nama</td>
                        <td width="1%">:</td>
                        <td width="auto">{{ $seminar->registration->thesis->student->study_program->department->department_officer->where('occupation', 'kajur')->first()->personnel->fullname ?? '-'}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>NIP</td>
                        <td>:</td>
                        <td>{{ $seminar->registration->thesis->student->study_program->department->department_officer->where('occupation', 'kajur')->first()->personnel->nip ?? '-'}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>Ketua Jurusan {{ $seminar->registration->thesis->student->study_program->department->department_name}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="3">Selanjutnya disebut pihak pertama.</td>
                    </tr>
                @endif
                <tr>
                    <td colspan="2" style="height: 20px"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td width="35%">Nama</td>
                    <td>:</td>
                    <td>{{ ucwords(strtolower($seminar->registration->thesis->student->fullname)) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td width="35%">NIM</td>
                    <td>:</td>
                    <td>{{ $seminar->registration->thesis->student->nim }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td width="35%">Tempat, tanggal lahir</td>
                    <td>:</td>
                    <td>{{ $seminar->registration->thesis->student->birthplace }}, {{ date('d-m-Y', strtotime($seminar->registration->thesis->student->birthdate)) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td width="35%">Jurusan</td>
                    <td>:</td>
                    <td>{{ $seminar->registration->thesis->student->study_program->department->department_name }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td width="35%">Program Studi</td>
                    <td>:</td>
                    <td>{{ $seminar->registration->thesis->student->study_program->study_program }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td width="35%">Judul Skripsi</td>
                    <td>:</td>
                    <td>{{ $seminar->registration->thesis->title }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="3">Selanjutnya disebut pihak kedua.</td>
                </tr>
            </table>
        </div>
        <div>
            @php

                $nilai = "";
                // $tabel_nilai = array(
                //     ['min' => 3.60, 'max' => 4.00, 'huruf' => 'A', 'angka' => 4.00, 'predikat' => 'Pujian (Cumlaude)'],
                //     ['min' => 3.40, 'max' => 3.59, 'huruf' => 'A-', 'angka' => 3.70, 'predikat' => 'Pujian (Cumlaude)'],
                //     ['min' => 3.20, 'max' => 3.39, 'huruf' => 'B+', 'angka' => 3.30, 'predikat' => 'Sangat Memuaskan'],
                //     ['min' => 3.00, 'max' => 3.19, 'huruf' => 'B', 'angka' => 3.00, 'predikat' => 'Memuaskan'],
                //     ['min' => 2.80, 'max' => 2,99, 'huruf' => 'B-', 'angka' => 2.70, 'predikat' => 'Memuaskan'],
                //     // ['min' => 90.00, 'max' => 100.00, 'huruf' => 'A', 'angka' => 4.00, 'predikat' => 'Pujian (Cumlaude)'],
                //     // ['min' => 85.00, 'max' => 89.99, 'huruf' => 'A-', 'angka' => 3.70, 'predikat' => 'Pujian (Cumlaude)'],
                //     // ['min' => 80.00, 'max' => 84.99, 'huruf' => 'B+', 'angka' => 3.30, 'predikat' => 'Sangat Memuaskan'],
                //     // ['min' => 75.00, 'max' => 79.99, 'huruf' => 'B', 'angka' => 3.00, 'predikat' => 'Memuaskan'],
                //     // ['min' => 70.00, 'max' => 74.99, 'huruf' => 'B-', 'angka' => 2.70, 'predikat' => 'Memuaskan'],
                // );
                $tabel_nilai = array(
                    // ['min' => 3.70, 'max' => 4.00, 'huruf' => 'A', 'angka' => 4.00, 'predikat' => 'Pujian (Cumlaude)'],
                    // ['min' => 3.40, 'max' => 3.69, 'huruf' => 'A-', 'angka' => 3.70, 'predikat' => 'Pujian (Cumlaude)'],
                    // ['min' => 3.20, 'max' => 3.39, 'huruf' => 'B+', 'angka' => 3.30, 'predikat' => 'Sangat Memuaskan'],
                    // ['min' => 3.00, 'max' => 3.19, 'huruf' => 'B', 'angka' => 3.00, 'predikat' => 'Memuaskan'],
                    // ['min' => 2.80, 'max' => 2,99, 'huruf' => 'B-', 'angka' => 2.70, 'predikat' => 'Memuaskan'],
                    ['min' => 90.00, 'max' => 100.00, 'huruf' => 'A', 'angka' => 4.00, 'predikat' => 'Pujian (Cumlaude)'],
                    ['min' => 85.00, 'max' => 89.99, 'huruf' => 'A-', 'angka' => 3.70, 'predikat' => 'Pujian (Cumlaude)'],
                    ['min' => 80.00, 'max' => 84.99, 'huruf' => 'B+', 'angka' => 3.30, 'predikat' => 'Sangat Memuaskan'],
                    ['min' => 75.00, 'max' => 79.99, 'huruf' => 'B', 'angka' => 3.00, 'predikat' => 'Memuaskan'],
                    ['min' => 70.00, 'max' => 74.99, 'huruf' => 'B-', 'angka' => 2.70, 'predikat' => 'Memuaskan'],
                    ['min' => 65.00, 'max' => 69.99, 'huruf' => 'C+', 'angka' => 2.30, 'predikat' => 'Memuaskan'],
                );
                foreach ($tabel_nilai as $tabel_nilai){
                    if($seminar->registration->thesis->student->bachelor_degree->total_nilai_komprehensif >= $tabel_nilai['min'] && $seminar->registration->thesis->student->bachelor_degree->total_nilai_komprehensif <= $tabel_nilai['max']){
                        $nilai = $tabel_nilai['huruf'];
                    }
                }
                // $seminar->registration->thesis->student->bachelor_degree->rerata_index_yudisium
            @endphp
            <p style="text-align:justify;text-indent:3rem">
                Berdasarkan peraturan dan ketentuan yang berlaku dan dengan telah dipenuhinya semua persyaratan terkait dengan pelaksanaan Ujian Sarjana, maka dengan ini Pihak Pertama menyelenggarakan yudisium dan menetapkan bahwa Pihak Kedua dinyatakan Lulus dengan nilai <strong>{{ $nilai }}</strong> dengan predikat <strong>{{ $seminar->registration->thesis->student->bachelor_degree->predikat ?? ' ' }}</strong>.
            </p>
            <p style="text-align:justify;text-indent:3rem">
                Berita acara ini dibuat dengan sesungguhnya berdasarkan pada ketentuan yang berlaku di Universitas Negeri Gorontalo.
            </p>
        </div>        
        <div>
            <table width="100%">
                <tr>
                    <td width="60%"></td>
                    <td width="40%"></td>
                </tr>
                <tr>
                    <th></th>
                    <th align="left">Dibuat di Gorontalo, {{ date('d', strtotime($seminar->tgl_ujian)).' '.ucwords(strtolower($bulan[date('n',strtotime($seminar->tgl_ujian))])).' '.date('Y', strtotime($seminar->tgl_ujian)) }}</th>
                </tr>
                <tr>
                    <td>
                        Pihak Pertama,
                    </td>
                    <td>
                        Pihak Kedua,
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="height: 60px;"></td>
                </tr>
                <tr>
                    @if ($status == 2)
                        <td>{{ $seminar->examiner->where('order', 0)->first()->personnel->fullname ?? '-'}}</td>
                    @else
                        <td>{{ $seminar->registration->thesis->student->study_program->department->department_officer->where('occupation', 'kajur')->first()->personnel->fullname ?? '-' }}</td>
                    @endif
                    <td>{{ $seminar->registration->thesis->student->fullname ?? '-'}}</td>
                </tr>
                <tr>
                    @if ($status == 2)
                        <td>{{ $seminar->examiner->where('order', 0)->first()->personnel->nip  ?? '-'}}</td>
                    @else
                        <td>{{ $seminar->registration->thesis->student->study_program->department->department_officer->where('occupation', 'kajur')->first()->personnel->nip  ?? '-'}}</td>
                    @endif
                    <td>{{ $seminar->registration->thesis->student->nim ?? '-' }}</td>
                </tr>
            </table>
        </div>
</body>

</html>

