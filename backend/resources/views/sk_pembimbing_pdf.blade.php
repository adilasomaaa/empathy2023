<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    {{-- <title>{{ 'SK_komprehensif ' . $committee->committee_name }}</title> --}}
    <style>
        .page_break {
            /* page-break-before: always; */
            page-break-after: always;
            /* margin-bottom: 50px; */
        }

        * {
            font-family: "Bookman Old Style", serif;
            font-size: 17px;
        }

        table {
            /* font-size: 16px; */
            /* font-size: 4.2333mm; */
        }

    </style>
</head>

<body style="padding: 0cm 0cm 0cm 1cm">
    @php
    $bulan = array (1 => 'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
    );
    $hari = array('Sun' => 'Minggu','Mon' => 'Senin','Tue' => 'Selasa','Wed' => 'Rabu','Thu' => 'Kamis','Fri' => 'Jumat','Sat' => 'Sabtu'
    );
    @endphp
    <div class="row">
        <table width="100%">
            <tr>
                <td width="10%">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/img/cop/logo.png'))) }}" width="100px" height="auto" alt="">
                </td>
                <td align="center" width="auto" style="font-size: 17px;">
                    <p>
                        KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI<br>
                        <strong>UNIVERSITAS NEGERI GORONTALO</strong><br>
                        <strong> FAKULTAS {{ strtoupper(str_replace('fakultas', '', strtolower($dekan->faculty->faculty_name))) }}</strong><br>
                        @php
                        $alamat = str_replace('Kecamatan', '<br> Kecamatan',$dekan->faculty->address);
                        @endphp
                        {!! $alamat !!}<br>
                        Laman www.ung.ac.id<br>
                    </p>
                </td>
                <td width="15%"></td>
            </tr>
        </table>
        <hr style="border: 2px solid black; margin-top: -10px">
        <div class="row">
            <center>
                <p>KEPUTUSAN <br> DEKAN FAKULTAS {{ strtoupper(str_replace('fakultas', '', strtolower($dekan->faculty->faculty_name))) }}<br>UNIVERSITAS NEGERI GORONTALO <br> NOMOR : {{ $thesis_guide_decree->decree_number }} </p>
                <span style="margin-top: 30px">
                    TENTANG<br>PENETAPAN DOSEN PEMBIMBING SKRIPSI MAHASISWA PROGRAM STUDI {{ strtoupper($thesis_guide_decree->thesis->first()->student->study_program->study_program) }}
                    <br>
                    FAKULTAS {{ strtoupper(str_replace('fakultas', '', strtolower($dekan->faculty->faculty_name))) }}
                    <br>
                    UNIVERSITAS NEGERI GORONTALO

                </span>
                <br>
                <br>
                <span style="margin-top: 30px">
                    DENGAN RAHMAT TUHAN YANG MAHA ESA <br> DEKAN FAKULTAS {{ strtoupper(str_replace('fakultas', '', strtolower($dekan->faculty->faculty_name))) }} <br> UNIVERSITAS NEGERI GORONTALO
                </span>
            </center>

        </div>
        <div class="row" style="margin-top: 20px">
            <table width="100%">
                <tr>
                    <td rowspan="4" valign="top" width="13%">Menimbang</td>
                    <td valign="top" rowspan="4" width="8%">:</td>
                    <td valign="top" width="2%">a.</td>
                    <td align="justify">bahwa dalam penyelesaian studi bagi mahasiswa program S1 pada Program Studi
                        {{-- Pendidikan Bahasa dan Sastra Indonesia --}}
                        {{ $thesis_guide_decree->thesis->first()->student->study_program->study_program }}
                        Fakultas Sastra dan Budaya, perlu menetapkan mahasiswa pada jalur skripsi;</td>
                </tr>
                <tr>
                    <td valign="top">b.</td>
                    <td align="justify">bahwa untuk butir a di atas perlu menentukan Dosen Pembimbing skripsi;</td>
                </tr>
                <tr>
                    <td valign="top">c.</td>
                    <td align="justify">bahwa dosen yang diusulkan oleh fakultas memenuhi syarat untuk membimbing skripsi;</td>
                </tr>
                <tr>
                    <td valign="top">d.</td>
                    <td align="justify">berhubung dengan butir a,b, dan c di atas perlu menerbitkan Surat Keputusan;</td>
                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 20px ">
            <table width="100%">
                <tr>
                    <td rowspan="" valign="top" width="13%">Mengingat</td>
                    <td valign="top" rowspan="" width="7%">:</td>
                    <td valign="top" width="2%">1.</td>
                    <td width="auto" align="justify">Undang-Undang Republik Indonesia Nomor 20 tahun 2003 tentang Sistem Pendidikan Nasional (Tambahan Lembaran Negara Republik Indonesia Nomor 4301);</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">2.</td>
                    <td width="auto" align="justify">Undang-Undang Nomor 14 Tahun 2005 tentang guru dan Dosen (Lembaran Negara Republik Indonesia Tahun 2005 Nomor 157, Tambahan Lembaran Negara Republik Indonesia Nomor 4586);</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">3.</td>
                    <td width="auto" align="justify">Undang-Undang Nomor 12 Tahun 2012 tentang Pendidikan Tinggi (Lembaran Negara Republik Indonesia Tahun 2012 Nomor 158, Tambahan Lembaran Negara Republik Indonesia Nomor 5336);</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">4.</td>
                    <td width="auto" align="justify">Undang-Undang Nomor 5 Tahun 2014 tentang aparatur sipil negara (Lembaran Negara Republik Indonesia Tahun 2014 Nomor 6, Tambahan Lembaran Negara Republik Indonesia Nomor 5494);</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">5.</td>
                    <td width="auto" align="justify">Peraturan Pemerintah Nomor 37 Tahun 2009 tentang dosen (Lembaran Negara Republik Indonesia Tahun 2009 Nomor 76, Tambahan Lembaran Negara Republik Indonesia Nomor 5007);</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">6.</td>
                    <td width="auto" align="justify">Peraturan Pemerintah Nomor 4 Tahun 2014 tentang Penyelenggaraan Pendidikan Tinggi dan Pengelolaan Pendidikan Tinggi (Lembaran Negara Republik Indonesia Tahun 2014 Nomor 16, Tambahan Lembaran Negara Republik Indonesia Nomor 5500);</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">7.</td>
                    <td width="auto" align="justify">Keputusan Mentri Riset, Teknologi dan Pendidikan Tinggi Republik Indonesia Nomor 11 Tahun 2015 tentang Organisasi dan Tata Kerja Universitas Negeri Gorontalo (Berita Negara Republik Indonesia Tahun 2015 Nomor 605);</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">8.</td>
                    <td width="auto" align="justify">Peraturan Menteri Riset, Teknologi, dan Pendidikan Tinggi Nomor 82 Tahun 2017 tentang STATUTA Universitas Negeri Gorontalo (Berita Negara Republik Indonesia Tahun 2017 Nomor 1919);</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">9.</td>
                    <td width="auto" align="justify">Keputusan Menteri Riset, Teknologi, dan Pendidikan Tinggi Nomor 32029/M/KP/2019 tentang Pengangkatan Rektor Universitas Negeri Gorontalo Periode Tahun 2019-2023;</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">10.</td>
                    <td width="auto" align="justify">Keputusan Menteri Riset, Teknologi, dan Pendidikan Tinggi Nomor 32029/M/KP/2019 tanggal 24 September 2019 tentang Pengangkatan Rektor Universitas Negeri Gorontalo Periode Tahun 2019-2023;</td>
                </tr>

                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">11.</td>
                    <td width="auto" align="justify">Pengangkatan Rektor Universitas Negeri Gorontalo Nomor 1 Tahun 2019 tentang Pengangkatan dan Pemberhentian Pemimpin pada Tingkat Fakultas;</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">12.</td>
                    <td width="auto" align="justify">SK Rektor Nomor 773/UN47/KP/2019, tanggal 22 November 2019 tentang Pengangkatan Dekan Fakultas Sastra dan Budaya Universitas Negeri Gorontalo Periode Tahun 2019-2023;</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">13.</td>
                    <td width="auto" align="justify">Keputusan Rektor Nomor : 1169/UN47.B3/HK.04/2019 Tanggal 1 November 2019 Tentang Pendelegasian Kepada Dekan, Direktur Pascasarjana dan Ketua Lembaga Untuk Menandatangani Surat Keputusan Atas Nama Rektor yang Berkaitan dengan Kegiatan Akademik;</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">14.</td>
                    <td width="auto" align="justify">Surat Usulan Ketua Program Studi
                        {{-- Pendidikan dan Sastra Indonesia  --}}
                        {{ $thesis_guide_decree->thesis->first()->student->study_program->study_program }}
                        Fakultas Sastra dan Budaya Universitas Negeri Gorontalo Nomor: {{ $thesis_guide_decree->decree_number }} tanggal {{ date('d ', strtotime($thesis_guide_decree->decree_date)).strtoupper($bulan[date('n', strtotime($thesis_guide_decree->decree_date))]).date(' Y', strtotime($thesis_guide_decree->decree_date)) }} tentang Permohonan Penerbitan SK Pembimbing Skripsi;</td>

                </tr>

            </table>
        </div>
        <div class="row" style="margin-top: 20px">
            <table width="100%">
                <tr>
                    <td colspan="5" align="center" width="100%">MEMUTUSKAN</td>
                </tr>
                <tr>
                    <td valign="top" width="13%">Menetapkan</td>
                    <td valign="top" width="8%">:</td>
                    <td valign="top" width="3%"></td>
                    <td align="justify" colspan="2">KEPUTUSAN DEKAN FAKULTAS {{ strtoupper(str_replace('fakultas', '', strtolower($dekan->faculty->faculty_name))) }} UNIVERSITAS NEGERI GORONTALO TENTANG PENETAPAN DOSEN PEMBIMBING SKRIPSI MAHASISWA PROGRAM STUDI {{ strtoupper($thesis_guide_decree->thesis->first()->student->study_program->study_program) }} FAKULTAS {{ strtoupper(str_replace('fakultas', '', strtolower($dekan->faculty->faculty_name))) }} UNIVERSITAS NEGERI GORONTALO.</td>


                </tr>
                <tr>
                    <td valign="top" width="13%">KESATU</td>
                    <td valign="top" width="8%">:</td>
                    <td valign="top" width="3%"></td>
                    <td align="justify" colspan="2">Dosen pembimbing skripsi bagi mahasiswa Program Studi
                        {{-- Pendidikan Bahasa Indonesia  --}}
                        {{ $thesis_guide_decree->thesis->first()->student->study_program->study_program }}
                        yang nama-namanya sebagaimana tercantum dalam lampiran surat keputusan.;</td>
                </tr>
                <tr>
                    <td valign="top" width="13%">KEDUA</td>
                    <td valign="top" width="8%">:</td>
                    <td valign="top" width="3%"></td>
                    <td align="justify" colspan="2">Tugas Pembimbing : </td>
                </tr>
                <tr>
                    <td valign="top" width="13%"></td>
                    <td valign="top" width="8%"></td>
                    <td valign="top" width="3%"></td>
                    <td align="justify" colspan="2">
                        <ol>
                            <li>
                                mengarahkan mahasiswa dalam menyusun skripsi;
                            </li>
                            <li>
                                memeriksa dan memberikan arahan kepada mahasiswa dalam kegiatan penelitian sehubungan dengan penyusunan skripsi;
                            </li>
                        </ol>
                    </td>
                </tr>
                <tr>
                    <td valign="top" width="13%">KETIGA</td>
                    <td valign="top" width="8%">:</td>
                    <td valign="top" width="3%"></td>
                    <td align="justify" colspan="2">Pelaksanaan bimbingan harus memperhatikan ketentuan yang ada dalam buku pedoman Universitas Negeri Gorontalo;</td>
                </tr>
                <tr>
                    <td valign="top" width="13%">KEEMPAT</td>
                    <td valign="top" width="8%">:</td>
                    <td valign="top" width="3%"></td>
                    <td align="justify" colspan="2">Biaya yang timbul akibat pelaksanaan Surat Keputusan ini dibebankan pada PNBP FSB tahun {{ date(' Y', strtotime($thesis_guide_decree->decree_date)) }};</td>

                </tr>
                <tr>
                    <td valign="top" width="13%">KELIMA</td>
                    <td valign="top" width="8%">:</td>
                    <td valign="top" width="3%"></td>
                    <td align="justify" colspan="2">Keputusan Dekan Fakultas Sastra dan Budaya Universitas Negeri Gorontalo ini berlaku sejak ditetapkan sampai dengan berakhirnya proses pelaksanaan bimbingan dan diberikan kepada yang bersangkutan untuk dilaksanakan dengan penuh rasa tanggung jawab dengan catatan akan ditinjau dan diperbaiki kembali bilamana terdapat kekeliruan di dalam penetapan ini;</td>
                </tr>
            </table>

        </div>
        <div class="row" style="margin-top: 20px">
            {{-- @php
                // $bulan = array (1 =>   'JANUARI',
                //     'FEBRUARI',
                //     'MARET',
                //     'APRIL',
                //     'MEI',
                //     'JUNI',
                //     'JULI',
                //     'AGUSTUS',
                //     'SEPTEMBER',
                //     'OKTOBER',
                //     'NOVEMBER',
                //     'DESEMBER'
                // );
            @endphp  --}}
            <table width="100%">
                <tr>
                    <td width="60%"></td>
                    <td width="40%">Ditetapkan di Gorontalo</td>
                </tr>
                <tr>
                    <td width="60%"></td>
                    <td width="40%">pada tanggal {{ date('d ', strtotime($thesis_guide_decree->decree_date)).ucfirst($bulan[date('n', strtotime($thesis_guide_decree->decree_date))]).date(' Y', strtotime($thesis_guide_decree->decree_date)) }}</td>
                </tr>
                <tr>
                    <td width="60%"></td>
                    <td width="40%">DEKAN,</td>
                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 40px">
            <table width="100%">
                <tr>
                    <td width="60%"></td>
                    <td width="40%"></td>
                </tr>
            </table>
        </div>
        <div class="row">
            <table width="100%">
                <tr>
                    <td width="60%"></td>
                    <td width="40%">{{ strtoupper($dekan->titleless_name) ?? '-' }}</td>

                </tr>
                <tr>
                    <td width="60%"></td>
                    <td width="40%">NIP. {{ $dekan->personnel->nip ?? '-' }}</td>
                </tr>
            </table>
        </div>
        <div class="row">
            <table width="100%">
                <tr>
                    <td>Tembusan Yth. <br>
                        <ol>
                            <li>Rektor</li>
                            <li>Wakil Rektor I</li>
                            <li>Wakil Dekan I</li>
                            <li>Ketua Program Studi
                                {{-- Pendidikan Bahasa dan Sastra Indonesia --}}
                                {{ $thesis_guide_decree->thesis->first()->student->study_program->study_program }}
                            </li>
                            <li>Yang bersangkutan</li>
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
    <div class="page_break"></div>
    <div class="row">
        <p> LAMPIRAN <br> KEPUTUSAN DEKAN FAKULTAS {{ strtoupper(str_replace('fakultas', '', strtolower($dekan->faculty->faculty_name))) }} UNG<br>
            NOMOR {{ $thesis_guide_decree->decree_number }}<br>
            TANGGAL
            {{-- {{ $thesis_guide_decree->decree_date }} --}}
            {{ date('d ', strtotime($thesis_guide_decree->decree_date)).ucfirst($bulan[date('n', strtotime($thesis_guide_decree->decree_date))]).date(' Y', strtotime($thesis_guide_decree->decree_date)) }}

            <br>
            {{-- Penetapan Mahasiswa Program S1 Program Studi {{ $thesis_guide_decree->thesis->first()->student->study_program->study_program }}
            dan Penunjukan Dosen Pembimbing Sripsi Fakultas {{ ucwords(str_replace('fakultas', '', strtolower($dekan->faculty->faculty_name))) }} Universitas Negeri Gorontalo --}}
        </p>


        {{-- Penetapan Dosen Pembimbing Skripsi Mahasiswa Jurusan {{ $thesis_guide_decree->department->department_name }} Fakultas {{ ucwords(str_replace('fakultas', '', strtolower($dekan->faculty->faculty_name))) }} Universitas Negeri Gorontalo --}}
        Penetapan Dosen Pembimbing Skripsi Mahasiswa Jurusan {{ $thesis_guide_decree->department->department_name }} Fakultas Sastra dan Budaya Universitas Negeri Gorontalo


    </div>

    <div class="row" style="margin-top: 40px">
        {{-- <table width= "100%">
            <tr>
                <td width="2%"><strong>I.</strong></td>
                <td width="98%" colspan="4"><strong>Panitia</strong></td>
            </tr>
        </table> --}}
        <table width="100%" style="border :1px solid black; border-collapse: collapse;">
            <tr style="border :1px solid black; border-collapse: collapse; padding : 6px;">
                <th style="border :1px solid black; border-collapse: collapse; padding : 6px;">NO</th>
                <th style="border :1px solid black; border-collapse: collapse; padding : 6px;">NAMA MAHASISWA</th>
                <th style="border :1px solid black; border-collapse: collapse; padding : 6px;">JUDUL SKRIPSI</th>
                <th style="border :1px solid black; border-collapse: collapse; padding : 6px;">PEMBIMBING</th>
            </tr>

            @forelse($thesis_guide_decree->thesis as $key => $value)
            <tr style="border :1px solid black; border-collapse: collapse; padding : 6px;">
                <td style="border :1px solid black; border-collapse: collapse; padding : 6px;">
                    {{ ++$key }}
                </td>
                <td style="border :1px solid black; border-collapse: collapse; padding : 6px;">
                    {{ $value->student->fullname }} <br> NIM : {{ $value->student->nim }}
                </td>
                <td style="border :1px solid black; border-collapse: collapse; padding : 6px;">
                    {{ $value->title }}
                </td>
                <td style="border :1px solid black; border-collapse: collapse; padding : 6px;">
                    <ol>
                        @forelse ($value->thesis_guide as $item)
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
        <table width="100%">
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
        <table width="100%">
            <tr>
                <td width="60%"></td>
                <td width="40%"></td>
            </tr>
        </table>
    </div>
    <div class="row">
        <table width="100%">
            <tr>
                <td width="60%"></td>
                <td width="40%">{{ strtoupper($dekan->titleless_name) ?? '-' }}</td>
            </tr>
            <tr>
                <td width="60%"></td>
                <td width="40%">NIP. {{ $dekan->personnel->nip ?? '-' }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
