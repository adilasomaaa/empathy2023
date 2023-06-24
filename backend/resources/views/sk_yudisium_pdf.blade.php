<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <title>SK Yudisium</title>
    <style>
        @page teacher {
            size: A4 landscape;
        }

        .teacherPage {
            page: teacher;
            page-break-after: always;
        }
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
                        {{-- <strong>FAKULTAS {{ strtoupper($bachelor_degree_decree->department->faculty->faculty_name) }}</strong><br> --}}
                        <strong>FAKULTAS SASTRA DAN BUDAYA</strong><br>
                        @php
                            $alamat = str_replace('Kecamatan', '<br> Kecamatan',$bachelor_degree_decree->department->faculty->address);
                        @endphp
                        Alamat : {!! $alamat !!}
                        <br>
                        <strong>Laman</strong> www.ung.ac.id<br>
                    </p>
                </td>
                <td width= "15%"></td>
            </tr>
        </table>
        <hr style="border: 2px solid black; margin-top: -10px">
        <div class="row">
            <table width="100%">
                <tr>
                    <td width="auto"></td>
                    <td width="70%" align="center">KEPUTUSAN</td>
                    <td width="auto"></td>
                </tr>
                <tr>
                    <td width="auto"></td>
                    <td width="50%" align="center">DEKAN FAKULTAS {{ strtoupper($bachelor_degree_decree->department->faculty->faculty_name) }}</td>
                    <td width="auto"></td>
                </tr>
                {{-- <tr>
                    <td width="auto"></td>
                    <td style="border-bottom: 1x dashed gray; padding-bottom: 15px" width="50%" align="center">UNIVERSITAS NEGERI GORONTALO</td>
                    <td width="auto"></td>
                </tr> --}}
                <tr>
                    <td width="auto"></td>
                    <td style="padding-bottom: 0px" width="50%" align="center">UNIVERSITAS NEGERI GORONTALO</td>
                    <td width="auto"></td>
                </tr>
                <tr>
                    <td width="auto"></td>
                    <td style="padding-top: 15px" width="50%" align="center">NOMOR : {{ $bachelor_degree_decree->no_sk }}</td>
                    <td width="auto"></td>
                </tr>
                <tr>
                    <td width="auto"></td>
                    <td style=" padding: 15px 0 15px 0" width="50%" align="center"><i>Tentang</i></i></td>
                    <td width="auto"></td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td width="auto"></td>
                    <td width="80%" align="center">PENETAPAN YUDISIUM LULUSAN PROGRAM SARJANA (S1)</td>
                    <td width="auto"></td>
                </tr>
                <tr>
                    <td width="auto"></td>
                    <td width="90%" align="center">PROGRAM STUDI  {{ strtoupper($bachelor_degree_decree->bachelor_degree->first()->student->study_program->study_program) }}</td>
                    <td width="auto"></td>
                </tr>
                <tr>
                    <td width="auto"></td>
                    <td width="50%" align="center">FAKULTAS {{ strtoupper($bachelor_degree_decree->department->faculty->faculty_name) }}</td>
                    <td width="auto"></td>
                </tr>
                <tr>
                    <td width="auto"></td>
                    <td width="50%" align="center">UNIVERSITAS NEGERI GORONTALO</td>
                    <td width="auto"></td>
                </tr>
                <tr>
                    <td width="auto"></td>
                    <td style="border-bottom: 1x dashed gray; padding-bottom: 15px" width="50%" align="center">SEMESTER {{ strtoupper($bachelor_degree_decree->semester)}} TAHUN AKADEMIK  {{ $bachelor_degree_decree->academic_year }}
                        {{-- {{ $bachelor_degree_decree->year - 1 }}/{{ $bachelor_degree_decree->year}}  --}}
                        TAHUN {{ $bachelor_degree_decree->year }}</td>
                    <td width="auto"></td>
                </tr>
                
            </table>

            <table width="100%">
                <tr>
                    <td width="auto"></td>
                    <td width="80%" style="padding-top: 20px" align="center">DENGAN RAHMAT TUHAN YANG MAHA ESA</td>
                    <td width="auto"></td>
                </tr>
                
                <tr>
                    <td width="auto"></td>
                    <td width="50%" align="center">DEKAN FAKULTAS {{ strtoupper($bachelor_degree_decree->department->faculty->faculty_name) }}</td>
                    <td width="auto"></td>
                </tr>
                <tr>
                    <td width="auto"></td>
                    <td width="50%" align="center">UNIVERSITAS NEGERI GORONTALO</td>
                    <td width="auto"></td>
                </tr>
                
            </table>
            
        </div>
        @php
            $fakultas = $bachelor_degree_decree->department->faculty->faculty_name;
            $prodi = $bachelor_degree_decree->bachelor_degree->first()->student->study_program->study_program;

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
            
        @endphp
         <div class="row" style="margin-top: 20px">
            <table width= "100%">
                <tr>
                    <td rowspan="4" valign="top" width="13%">Menimbang</td>
                    <td valign="top" rowspan="4" width="8%">:</td>
                    <td valign="top" width="2%">a.</td>
                    <td align="justify" >bahwa untuk penilaian keberhasilan dalam mengakhiri program sarjana (S1) Program Studi Pendidikan Bahasa dan Sastra Indonesia yang telah memenuhi persyaratan akademik dan administrasi, perlu dilaksanakan yudisium;</td>
                </tr>
                <tr>
                    <td valign="top">b.</td>
                    <td align="justify" >memperhatikan hasil indeks prestasi kumulatif (IPK) dan ujian komprehensif, bahwa nama-nama yang tersebut dalam lampiran surat keputusan ini dianggap mampu memenuhi persyaratan akademik dan  administrasi, untuk pelaksanaan yudisium;</td>
                </tr>
                <tr>
                    <td valign="top">c.</td>
                    <td align="justify" >bahwa untuk kepentingan butir a dan b di atas, perlu menerbitkan surat keputusan Surat Keputusan;</td>
                </tr>
                
            </table>
        </div>
        <div class="row" style="margin-top: 20px ">
            <table width= "100%">
                <tr>
                    <td rowspan="" valign="top" width="13%">Mengingat</td>
                    <td valign="top" rowspan="" width="7%">:</td>
                    <td valign="top" width="2%">1.</td>
                    <td width="auto" align="justify" >Undang-Undang Republik Indonesia Nomor 20 Tahun 2003 tentang Sistem Pendidikan Nasional (Tambahan Lembaran Negara Republik Indonesia Nomor 4301);
                    </td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">2.</td>
                    <td width="auto" align="justify" >Undang-Undang Nomor 14 Tahun 2005 tentang Guru dan Dosen (Lembaran Negara Republik Indonesia Tahun 2005Nomor 157, Tambahan Negara Republik Indonesia Nomor 4586);</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">3.</td>
                    <td width="auto" align="justify" >Undang-Undang Nomor 12 Tahun 2012 Tentang Pendidikan Tinggi (Lembaran Negara Republik Indonesia Tahun 2012 Nomor 158, Tambahan Lembaran Negara Republik Indonesia Nomor 5336);</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">4.</td>
                    <td width="auto" align="justify" >Undang-Undang Nomor 5 Tahun 2014 tentang aparutur sipil negara (Lembaran Negara Republik Indonesia Tahun 2014 Nomor 6, Tambahan Lembaran Negara Republik Indonesia Nomor 5494);</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">5.</td>
                    <td width="auto" align="justify" >Peraturan Pemerintah Nomor 37 Tahun 2009 tentang dosen (Lembaran Negara Republik Indonesia Tahun 2009 Nomor 76, Tambahan Lembaran Negara Republik Indonesia Nomor 5007)
</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">6.</td>
                    <td width="auto" align="justify" >Peraturan Pemerintah Nomor 4 Tahun 2014 tentang Penyelenggaraan Pendidikan Tinggi dan Pengelolaan Pendidikan Tinggi (Lembaran Negara Republik Indonesia Tahun 2014 Nomor 16, Tambahan Lembaran Negara Republik Indonesia Nomor 5500);</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">7.</td>
                    <td width="auto" align="justify" >Peraturan Menteri Riset, Teknologi dan Pendidikan Tinggi Nomor 11 tahun 2015 tentang Organisasi dan tata kerja Universitas Negeri Gorontalo (Berita Negara Republik Indonesia Tahun 2015 Nomor 605);</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">8.</td>
                    <td width="auto" align="justify" >Peraturan Menteri Riset, Teknologi, dan Pendidikan Tinggi Nomor 82 Tahun 2017 tentang STATUTA Univeritas Negeri Gorontalo (Berita Negara Republik Indonesia Tahun 2017 Nomor 1919); </td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">9.</td>
                    <td width="auto" align="justify" >Keputusan Menteri Riset, Teknologi, dan Pendidikan Tinggi Nomor 32029/M/KP/2019 tentang Pegangkatan Rektor Universitas Negeri Gorontalo Periode Tahun 2019-2023;</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">10.</td>
                    <td width="auto" align="justify" >Keputusan Menteri Riset, Teknologi, dan Pendidikan Tinggi Republik Indonesia Nomor 32029/M/KP/2019 tanggal 24 September 2019 tentang Pengangkatan Rektor Universitas Negeri Gorontalo Periode Tahun 2019-2023;</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">11.</td>
                    <td width="auto" align="justify" >Peraturan Rektor Universitas Negeri Gorontalo Nomor 1 Tahun 2019 tentang Pengangkatan dan Pemberhentian Pimpinan Pada Tingkat Fakultas</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">12.</td>
                    <td width="auto" align="justify" >SK Rektor Nomor 773/UN47/KP/2019, tanggal 22 November 2019 tentang Pengangkatan Dekan Fakultas Sastra dan Budaya Universitas Negeri Gorontalo Periode Tahun 2019- 2023;</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">13.</td>
                    <td width="auto" align="justify" >Keputusan Rektor Nomor: 1169/UN47.B3/HK.04/2019 Tanggal 1 November 2019 Tentang Pendelegasian Kepada Dekan, Direktur Pascasarjana dan Ketua Lembaga untuk Menandatangani Surat Keputusan Atas Nama Rektor yang Berkaitan dengan Kegiatan Akademik;</td>
                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 20px">
            <table width= "100%">
                <tr>
                    <td colspan="5" align="center" width="100%">MEMUTUSKAN</td>
                </tr>
                <tr>
                    <td valign="top" width="13%">Menetapkan</td>
                    <td valign="top" width="8%">:</td>
                    <td valign="top" width="3%"></td>
                    <td align="justify" colspan="2">KEPUTUSAN DEKAN FAKULTAS {{ strtoupper($fakultas) }} UNIVERSITAS NEGERI GORONTALO TENTANG PENETAPAN YUDISIUM LULUSAN PROGRAM SARJANA (S1) PROGRAM STUDI {{ strtoupper($prodi) }} FAKULTAS {{ strtoupper($fakultas) }} UNIVERSITAS NEGERI GORONTALO SEMESTER {{ strtoupper($bachelor_degree_decree->semester)}} TAHUN AKADEMIK  {{ $bachelor_degree_decree->academic_year }}
                        {{-- {{ $bachelor_degree_decree->year - 1 }}/{{ $bachelor_degree_decree->year}}  --}}
                        TAHUN {{ $bachelor_degree_decree->year }}</td>
                </tr>
                <tr>
                    <td valign="top" width="13%">Kesatu</td>
                    <td valign="top" width="8%">:</td>
                    <td valign="top" width="3%"></td>
                    <td align="justify" colspan="2">Lulusan Program Sarjana (S1) Program Studi {{ ucwords($prodi) }} Fakultas {{ ucwords($fakultas) }} Universitas Negeri Gorontalo Tahun Akademik Semester {{ ucwords($bachelor_degree_decree->semester)}} Tahun Akademik 
                        {{-- {{ $bachelor_degree_decree->year - 1 }}/{{ $bachelor_degree_decree->year}}  --}} 
                        {{ $bachelor_degree_decree->academic_year }} sebagaimana namanamanya terlampir dalam surat keputusan ini;</td>
                </tr>
                <tr>
                    <td valign="top" width="13%">Kedua</td>
                    <td valign="top" width="8%">:</td>
                    <td valign="top" width="3%"></td>
                    <td align="justify" colspan="2">Kelulusan mahasiswa ditetapkan dengan kategori pujian, sangat memuaskan, dan memuaskan;</td>
                </tr>
                <tr>
                    <td valign="top" width="13%">Ketiga</td>
                    <td valign="top" width="8%">:</td>
                    <td valign="top" width="3%"></td>
                    {{-- <td align="justify" colspan="2">Mereka yang ditetapkan lulus direkomendasikan untuk mengikuti wisuda {{ ucwords(strtolower($bulan[date('n', strtotime($bachelor_degree_decree->graduation_date))])) }}  {{ $bachelor_degree_decree->year}};</td> --}}
                    <td align="justify" colspan="2">Mereka yang ditetapkan lulus direkomendasikan untuk mengikuti wisuda {{ $bachelor_degree_decree->graduation ?? ''}};</td>
                </tr>
                <tr>
                    <td valign="top" width="13%">Keempat</td>
                    <td valign="top" width="8%">:</td>
                    <td valign="top" width="3%"></td>
                    <td align="justify" colspan="2">Surat Keputusan Dekan Fakultas Sastra dan Budaya Universitas Negeri Gorontalo ini berlaku sejak ditetapkan sampai dengan berakhirnya proses pelaksanaan Yudisium dan diberikan kepada yang bersangkutan untuk dilaksanakan dengan penuh rasa tanggung jawab dengan catatan akan ditinjau dan diperbaiki kembali bilamana terdapat kekeliruan di dalam penetapan ini.</td>
                </tr>
            </table>
            
        </div>
        <div class="row" style="margin-top: 20px">
            
            <table width= "100%">
                <tr>
                    <td width="61%"></td>
                    <td width="15%">Ditetapkan di </td>
                    <td>: Gorontalo</td>
                </tr>
                <tr>
                    <td></td>
                    <td >Pada Tanggal </td>
                    <td>: {{ date('d ', strtotime($bachelor_degree_decree->graduation_date)).ucwords(strtolower($bulan[date('n', strtotime($bachelor_degree_decree->graduation_date))])).date(' Y', strtotime($bachelor_degree_decree->graduation_date)) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2" style="border-top: 1px solid black; padding-top : 5px" width="40%">DEKAN,</td>
                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 40px">
            <table width= "100%">
                <tr>
                    <td width="60%"></td>
                    <td width="40%"></td>
                </tr>
            </table>
        </div>
        <div class="row">
            <table width= "100%">
                <tr>
                    <td width="61%"></td>
                    <td>{{ strtoupper($bachelor_degree_decree->department->faculty->faculty_officer->where('occupation', 'dekan')->first()->titleless_name ?? '-') }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>NIP. {{ $bachelor_degree_decree->department->faculty->faculty_officer->where('occupation', 'dekan')->first()->personnel->nip ?? '-' }}</td>
                </tr>
            </table>
        </div>
        <div class="row">
            <table width= "100%">
                <tr>
                    <td>Tembusan Yth. <br>
                        <ol>
                            <li>Rektor</li>
                            <li>Wakil Rektor I</li>
                            <li>Bendahara Pengeluaran</li>
                            <li>Yang bersangkutan untuk dilaksanakan</li>
                            <li>Arsip</li>
                        </ol>
                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                </tr>
            </table>
        </div>
    </div>
    {{-- <div class="teacherPage"></div> --}}

    {{--<div class="row" style="margin-top: 40px">
        <table width= "100%">
            <tr>
                <td width="2%"><strong>I.</strong></td>
                <td width="98%" colspan="4"><strong>Panitia</strong></td>
            </tr>
        </table>
        <table width= "100%">
            @forelse ($bachelor_degree_decree->seminar->first()->registration->registration_periode->committee->committee_member as $item)
                <tr>
                    <td width="2%"></td>
                    <td width="20%">{{ $item->role }}</td>
                    <td width="2%">:</td>
                    <td width="auto">{{ $item->personnel->fullname }}</td>
                    <td width="20%">{{ $item->occupation }}</td>
                </tr>    
            @empty
                
            @endforelse
            
        </table>
    </div>

    <div class="row" style="margin-top: 40px">
        <table width= "100%">
            <tr>
                <td width="2%"><strong>II.</strong></td>
                <td width="98%" colspan="4"><strong>Peserta Ujian Proposal</strong></td>
            </tr>
        </table>
        <table width= "100%" style="border :1px solid black; border-collapse: collapse;">
            <tr style="border :1px solid black; border-collapse: collapse; padding : 6px;">
                <th width="5%" style="border :1px solid black; border-collapse: collapse; padding : 6px;">NO</th>
                <th width="20%" style="border :1px solid black; border-collapse: collapse; padding : 6px;">NAMA MAHASISWA</th>
                <th width="40%" style="border :1px solid black; border-collapse: collapse; padding : 6px;">JUDUL PROPOSAL</th>
                <th style="border :1px solid black; border-collapse: collapse; padding : 6px;">PENGUJI</th>
            </tr>
            @forelse($bachelor_degree_decree->seminar as $key => $value)
                <tr style="border :1px solid black; border-collapse: collapse; padding : 6px;">
                    <td style="border :1px solid black; border-collapse: collapse; padding : 6px;">
                        {{ ++$key }}
                    </td>
                    <td style="border :1px solid black; border-collapse: collapse; padding : 6px;">
                        {{ $value->registration->thesis->student->fullname }} <br> NIM : {{ $value->registration->thesis->student->nim }}
                    </td>
                    <td style="border :1px solid black; border-collapse: collapse; padding : 6px;">
                        {{ $value->registration->thesis->title }}
                    </td>
                    <td style="border :1px solid black; border-collapse: collapse; padding : 6px;">
                        <ol>
                            @forelse ($value->examiner as $item)
                                <li>{{ $item->personnel->fullname }}</li>
                            @empty
                                {{ '-' }}
                            @endforelse
                        </ol>
                    </td>
                </tr>    
            @empty

            @endforelse
            
        </table>
    </div>
    <div class="row" style="margin-top: 20px">
        <table width= "100%">
            <tr>
                <td width="60%"></td>
                <td width="40%">Ditetapkan di Gorontalo</td>
            </tr>
            <tr>
                <td width="60%"></td>
                <td width="40%">DEKAN,</td>
            </tr>
        </table>
    </div>
    <div class="row" style="margin-top: 40px">
        <table width= "100%">
            <tr>
                <td width="60%"></td>
                <td width="40%"></td>
            </tr>
        </table>
    </div>
    <div class="row">
        <table width= "100%">
            <tr>
                <td width="60%"></td>
                <td width="40%">{{ $bachelor_degree_decree->department->faculty->faculty_officer->where('occupation', 'dekan')->first()->personnel->fullname ?? '-' }}</td>
            </tr>
            <tr>
                <td width="60%"></td>
                <td width="40%">NIP. {{ $bachelor_degree_decree->department->faculty->faculty_officer->where('occupation', 'dekan')->first()->personnel->nip ?? '-' }}</td>
            </tr>
        </table>
    </div> --}}

</body>

</html>

