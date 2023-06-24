<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <title>BERITA ACARA KOMPREHENSIF
    </title>
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
                    KEMENTERIAN PENDIDIKAN, KEBUDAYAAN,<br>RISET, DAN TEKNOLOGI<br>
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
                        {{-- SASTRA DAN BUDAYAUDI PENDIDIKAN BAHASA DAN SASTRA INDONESIA DAN PENUNJUKAN DOSEN PEMBIMBING SKRIPSI FAKULTAS {{ strtoupper($seminar->seminar_decree->department->faculty->faculty_name) }} UNIVERSITAS NEGERI GORONTALO 
                </span> --}}
            </center>
            
            <p style="text-align: justify; ">Pada hari ini {{ $hari[date('D', strtotime($seminar->tgl_ujian))] }}, tanggal {{ date('d', strtotime($seminar->tgl_ujian))}}, bulan {{ ucwords(strtolower($bulan[date('n',strtotime($seminar->tgl_ujian))])) }}, tahun {{ date('Y', strtotime($seminar->tgl_ujian)) }} Sesuai SK Dekan Nomor {{ $seminar->seminar_decree->decree_number }} tanggal {{ date('d', strtotime($seminar->seminar_decree->decree_date))}} bulan {{ ucwords(strtolower($bulan[date('n',strtotime($seminar->seminar_decree->decree_date))])) }} tahun {{ date('Y', strtotime($seminar->seminar_decree->decree_date)) }} telah dilaksanakan ujian Komprehensif atas Nama :</p>
        </div>
        <div class="row" style="">
            
            <table width= "100%">
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
                    <td>Angkatan</td>
                    <td>:</td>
                    <td>{{ $seminar->registration->thesis->student->class_year }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Jurusan</td>
                    <td>:</td>
                    <td>{{ $seminar->registration->thesis->student->study_program->department->department_name }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Program Studi</td>
                    <td>:</td>
                    <td>{{ $seminar->registration->thesis->student->study_program->study_program }}</td>
                </tr>
                <tr>
                    <td></td></td>
                    <td>Lama Studi</td>
                    <td>:</td>
                    <td>
                        {{ intval((int)$seminar->registration->thesis->student->bachelor_degree->lama_studi / 12) > 0 ? intval((int)$seminar->registration->thesis->student->bachelor_degree->lama_studi / 12).' Tahun' : '' }} {{ $seminar->registration->thesis->student->bachelor_degree->lama_studi % 12 > 0 ? $seminar->registration->thesis->student->bachelor_degree->lama_studi % 12 .' Bulan' : ''  }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>Lama Bimbingan</td>
                    <td>:</td>
                    <td>
                        {{ intval((int)$seminar->registration->thesis->student->bachelor_degree->lama_bimbingan / 12) > 0 ? intval((int)$seminar->registration->thesis->student->bachelor_degree->lama_bimbingan / 12).' Tahun' : '' }} {{ $seminar->registration->thesis->student->bachelor_degree->lama_bimbingan % 12 > 0 ? $seminar->registration->thesis->student->bachelor_degree->lama_bimbingan % 12 .' Bulan' : ''  }}
                    </td>
                </tr>
            </table>
        </div>
        <p>
            dengan hasil penelitian sebegai berikut : 
        </p>
        <table width="100%" style="border-collapse: collapse; border: 1px solid black; font-size: 10px" >
            <tr>
                <th style="border: 1px solid black" width="5%" rowspan="2">No</th>
                <th style="border: 1px solid black" width="40%" rowspan="2">Aspeke Penilaian</th>
                <th style="border: 1px solid black" colspan="{{ $seminar->examiner->count()+2 }}">Nilai Penguji</th>
                <th style="border: 1px solid black" width="10%" rowspan="2">N x B</th>
            </tr>
            <tr>
                @forelse ($seminar->examiner as $item)
                    <th style="border: 1px solid black">{{ $item->order + 1 }}</th>
                @empty
                @endforelse
                <th style="border: 1px solid black">Rerata</th>
                <th style="border: 1px solid black">Bobot</th>
            </tr>
            @php
                $jml_total_nilai_komprehensif = 0;
                $total_bobot = 0;
                $total_nilai_x_bobot = 0;
                $nilai_x_bobot = 0;
            @endphp
            @forelse ($seminar->registration->registration_period->grading_template->grading_list as $key => $grading_list)
                @php
                    $jml_nilai = 0;
                    $jum_penguji=0;
                    $nilai= 0;
                @endphp
                <tr>
                    <td align="center" style="border: 1px solid black"style="border: 1px solid black">{{ ++$key }}</td>
                    <td style="border: 1px solid black " align="">{{ $grading_list->aspect }}</td>
                    @forelse ($seminar->examiner as $no => $examiner)

                        @forelse ($examiner->grade as $no => $grade)
                            @if ($grading_list->id == $grade->grading_list_id)
                                @php
                                    $nilai = $grade->grade
                                @endphp
                                <td align="center" style="border: 1px solid black">{{ $grade->grade}}</td>
                            @endif
                        @empty
                        @endforelse
                        @php
                            $jml_nilai += $nilai;
                            $jum_penguji++;
                        @endphp
                    @empty
                    @endforelse
                    @php
                        $rata = $jml_nilai / $jum_penguji ;
                        $total_bobot += $grading_list->weight;
                        $nilai_x_bobot = $rata * $grading_list->weight;
                        $total_nilai_x_bobot += $nilai_x_bobot;    
                    @endphp
                    <td align="center" style="border: 1px solid black">{{ round($rata,2)}}</td>
                    <td align="center" style="border: 1px solid black">{{ $grading_list->weight }}</td>
                    <td align="center" style="border: 1px solid black">{{ round($nilai_x_bobot,2) }}</td>
                </tr>
            @empty
            @endforelse
            @php
                $total_nilai_komprehensif = $total_nilai_x_bobot / $total_bobot;
            @endphp
            <tr>
                <th style="border: 1px solid black" width="40%" colspan="2">Total</th>
                <th style="border: 1px solid black" colspan="{{ $seminar->examiner->count()+1 }}"></th>
                <th style="border: 1px solid black">{{ $total_bobot }}</th>
                <th style="border: 1px solid black" width="10%" colspan="">{{ round($total_nilai_x_bobot,2) }}</th>
            </tr>
        </table>
        <br>
        <table width="80%">
            <tr>
                <th width="30%" style="border: 1px solid black" rowspan="2">Indeks Yudisium</th>
                <th width="5%" rowspan="2"></th>
                <th width="15%" style="border-bottom: 1px solid black">{{ round($total_nilai_x_bobot,2) }}</th>
                <th rowspan="2">=</th>
                <th style="border: 1px solid black" rowspan="2">{{ round($total_nilai_komprehensif,2) }}</th>
            </tr>
            <tr>
                <th>{{ $total_bobot }}</th>
            </tr>
        </table>
        <br>
      <div>
            <table width="100%">
                {{-- <tr>
                    <td width="60%"></td>
                    <td width="40%"></td>
                </tr> --}}
                <tr>
                    <th width="60%"></th>
                    <th width="40%" align="left">Gorontalo, {{ date('d', strtotime($seminar->tgl_ujian)).' '.ucwords(strtolower($bulan[date('n',strtotime($seminar->tgl_ujian))])).' '.date('Y', strtotime($seminar->tgl_ujian)) }}</th>
                </tr>
                
                <tr>
                    <td>Mengetahui:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Wakil Dekan I,</td>
                    <td>Ketua Jurusan,</td>
                </tr>
                <tr>
                    <td colspan="2" style="height: 50px;"></td>
                </tr>
                <tr>
                    <td>{{ $seminar->registration->thesis->student->study_program->department->faculty->faculty_officer->where('occupation', 'wadek_1')->first()->personnel->fullname ?? '-' }}</td>
                    <td>{{ $seminar->registration->thesis->student->study_program->department->department_officer->where('occupation', 'kajur')->first()->personnel->fullname ?? '-'}}</td>
                </tr>
                <tr>
                    <td>NIP {{ $seminar->registration->thesis->student->study_program->department->faculty->faculty_officer->where('occupation', 'wadek_1')->first()->personnel->nip ?? '-' }}</td>
                    <td>NIP {{ $seminar->registration->thesis->student->study_program->department->department_officer->where('occupation', 'kajur')->first()->personnel->nip ?? '-'}}</td>
                </tr>
                
            </table>
        </div>
</body>

</html>

