<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <title>SK_komprehensif</title>
    <style>
        .page_break {
            /* page-break-before: always; */
            page-break-after: always;
            /* margin-bottom: 50px; */
        }

        * {
            font-family: "Sans-Serif", serif;
            font-size: 15px;
        }

        table {
            /* font-size: 16px; */
            /* font-size: 4.2333mm; */
        }

    </style>
</head>

<body style="padding: 0cm 0cm 0cm 1cm">
    @php
    $bulan = array (1 => 'JANUARI',
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
                        {{-- <strong>FAKULTAS {{ strtoupper($seminar_decree->department->faculty->faculty_name) }}</strong><br> --}}
                        <strong>FAKULTAS SASTRA DAN BUDAYA</strong><br>
                        @php
                        $alamat = str_replace('Kecamatan', '<br> Kecamatan',$seminar_decree->department->faculty->address);
                        @endphp
                        {!! $alamat !!}<br>
                        Laman www.ung.ac.id<br>
                    </p>
                </td>
                <td width="5%"></td>
            </tr>
        </table>
        <hr style="border: 2px solid black; margin-top: -10px">
        <div class="row">
            <center>
                <p>KEPUTUSAN DEKAN FAKULTAS SASTRA DAN BUDAYA<br>UNIVERSITAS NEGERI GORONTALO <br> NOMOR : {{ $seminar_decree->decree_number }} </p>

                {{-- <p>KEPUTUSAN DEKAN FAKULTAS {{ strtoupper($seminar_decree->department->faculty->faculty_name) }}<br>UNIVERSITAS NEGERI GORONTALO <br> NOMOR : {{ $seminar_decree->decree_number }} </p> --}}
                <span style="margin-top: 30px">
                    TENTANG<br>PANITIA DAN DOSEN PENGUJI UJIAN KOMPREHENSIF<br>PROGRAM S1 BAGI MAHASISWA JALUR SKRIPSI<br>PROGRAM STUDI {{ strtoupper($seminar_decree->seminar->first()->registration->thesis->student->study_program->study_program) }} <br>FAKULTAS SASTRA DAN BUDAYA UNIVERSITAS NEGERI GORONTALO

                    {{-- TENTANG<br>PANITIA DAN DOSEN PENGUJI UJIAN KOMPREHENSIF<br>PROGRAM S1 BAGI MAHASISWA JALUR SKRIPSI<br>PROGRAM STUDI PENDIDIKAN BAHASA DAN SASTRA INDONESIA <br>FAKULTAS {{ strtoupper($seminar_decree->department->faculty->faculty_name) }} UNIVERSITAS NEGERI GORONTALO --}}
                </span>
            </center>
            <center style="padding: 0; margin : 0">
                <p>DEKAN FAKULTAS SASTRA DAN BUDAYA<br>UNIVERSITAS NEGERI GORONTALO
                    {{-- <p>DEKAN FAKULTAS {{ strtoupper($seminar_decree->department->faculty->faculty_name) }}<br>UNIVERSITAS NEGERI GORONTALO --}}
            </center>
        </div>
        <div class="row">
            <table width="100%">
                <tr>
                    <td rowspan="4" valign="top" width="13%">Menimbang</td>
                    <td valign="top" rowspan="4" width="8%">:</td>
                    <td valign="top" width="2%">a.</td>
                    <td align="justify">bahwa untuk penilaian keberhasilan dalam mengakhiri Program S1 bagi mahasiswa yang telah memenuhi persyaratan akademik dan administrasi, perlu diadakan Ujian Komprehensif,</td>
                </tr>
                <tr>
                    <td valign="top">b.</td>
                    <td align="justify">bahwa untuk menyelenggarakan ujian tersebut perlu dibentuk panitia pelaksana,</td>
                </tr>
                <tr>
                    <td valign="top">c.</td>
                    <td align="justify">berhubung dengan butir a dan b di atas perlu menerbitkan surat keputusan.</td>
                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 20px ">
            <table width="100%">
                <tr>
                    <td rowspan="" valign="top" width="13%">Mengingat</td>
                    <td valign="top" rowspan="" width="7%">:</td>
                    <td valign="top" width="2%">1.</td>
                    <td width="auto" align="justify">Undang-Undang Republik Indonesia Nomor 20 tahun 2003 tentang Sistem Pendidikan Nasional;</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">2.</td>
                    <td width="auto" align="justify">Undang-Undang Nomor 14 Tahun 2005 tentang guru dan Dosen;</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">3.</td>
                    <td width="auto" align="justify">Undang-Undang Nomor 12 Tahun 2012 tentang Pendidikan Tinggi;</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">4.</td>
                    <td width="auto" align="justify">Peraturan Pemerintah Nomor 4 Tahun 2014 tentang Penyelenggaraan Pendidikan Tinggi dan Pengelolaan Pendidikan Tinggi;</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">5.</td>
                    <td width="auto" align="justify">Keputusan Presiden Republik Indonesia Nomor 54 Tahun 2004 tentang Perubahan IKIP Gorontalo Menjadi Universitas Negeri Gorontalo;</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">6.</td>
                    <td width="auto" align="justify">Peraturan Mentri Pendidikan Nasional Republik Indonesia Nomor 18 Tahun 2006 tentang STSTUTS Universitas Negeri Gorotalo;</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">7.</td>
                    <td width="auto" align="justify">Keputusan Mentri Riset, Teknologi dan Pendidikan Tinggi Republik Indonesia Nomor 11 Tahun 2015 tentang Organisasi dan Tata Kerja Universitas Negeri Gorontalo;</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">8.</td>
                    <td width="auto" align="justify">Keputusan Mentri Keuangan Nomor 131/KMK.05/2009 tentang Penetapan Universitas Negeri Gorontalo pada Department Pendidikan Nasional sebagai Instansi Pemerintah yang menerapkan Pegelolaan Keuangan Badan Layanan Umum (PK-BLU);</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">9.</td>
                    <td width="auto" align="justify">Keputusan Menteri Riset, Teknologi, dan Pendidikan Tinggi Republik Indonesia Nomor 32029/M/KPT.KP/2019 tanggal 24 September 2019 tentang Pengangkatan <strong>Dr. Eduart Wolok, S.T., M.T.,</strong> sebagai Rektor Universitas Negeri Gorontalo Periode Tahun 2019-2023;</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">10.</td>
                    <td width="auto" align="justify">SK Rektor Nomor 773/UN47/KP/2019, tanggal 22 November 2019 tentang Pengangkatan Dekan Fakultas di Lingkungan UNG;</td>
                </tr>

                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">11.</td>
                    <td width="auto" align="justify">Keputusan Rektor Nomor 1169/UN57/HK.02/2019 tanggal 1 November2019 tantang Pendelegasian Kepada Dekan, Direktur Pacasarjana dan ketua Lembaga untuk Menandatangani Surat Keputusan atas Nama Rektor yang Berkaitan dengan Kegiatan Akademik;</td>
                </tr>
                <tr>
                    <td rowspan="" valign="top" width="13%"></td>
                    <td valign="top" rowspan="" width="7%"></td>
                    <td valign="top" width="2%">12.</td>
                    <td width="auto" align="justify">Surat Usulan Ketua Prodi {{ ucwords($seminar_decree->seminar->first()->registration->thesis->student->study_program->study_program) }} Fakultas Sastra dan Budaya Universitas Negeri Gorontalo Nomor {{ $seminar_decree->recommendation_letter_number }} tanggal {{ date('d ', strtotime($seminar_decree->recommendation_letter_date)).ucwords(strtolower($bulan[date('n', strtotime($seminar_decree->recommendation_letter_date))])).date(' Y', strtotime($seminar_decree->recommendation_letter_date)) }} tentang Permohonan Penerbitan SK ujian komprehensif.</td>

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
                    <td align="justify" colspan="2">KEPUTUSAN DEKAN FAKULTAS SASTRA DAN BUDAYA UNIVERSITAS NEGERI GORONTALO TENTANG PANITIA DAN DOSEN PENGUJI UJIAN KOMPREHENSIF PROGRAM S1 BAGI MAHASISWA JALUR SKRIPSI PROGRAM STUDI {{ strtoupper($seminar_decree->seminar->first()->registration->thesis->student->study_program->study_program) }} FAKULTAS SASTRA DAN BUDAYA UNIVERSITAS NEGERI GORONTALO.</td>

                    {{-- <td align="justify" colspan="2">KEPUTUSAN DEKAN FAKULTAS {{ strtoupper($seminar_decree->department->faculty->faculty_name) }} UNIVERSITAS NEGERI GORONTALO TENTANG PANITIA DAN DOSEN PENGUJI UJIAN KOMPREHENSIF PROGRAM S1 BAGI MAHASISWA JALUR SKRIPSI PROGRAM STUDI PENDIDIKAN BAHASA DAN SASTRA INDONESIA FAKULTAS {{ strtoupper($seminar_decree->department->faculty->faculty_name) }} UNIVERSITAS NEGERI GORONTALO.</td> --}}
                </tr>
                <tr>
                    <td valign="top" width="13%">KESATU</td>
                    <td valign="top" width="8%">:</td>
                    <td valign="top" width="3%"></td>
                    <td align="justify" colspan="2">Panitia ujian Komperensif bagi mahasiswa Fakultas Sastra Dan Budaya Program Studi {{ strtoupper($seminar_decree->seminar->first()->registration->thesis->student->study_program->study_program) }} yang komposisi dan personalianya serta identitas mahasiswa yang diuji sebagaimana terlampir;</td>


                    {{-- <td align="justify" colspan="2">Panitia ujian Komperensif bagi mahasiswa Fakultas {{ ucwords($seminar_decree->department->faculty->faculty_name) }} Program Studi Pendidikan Bahasa dan Sastra Indonesia yang komposisi dan personalianya serta identitas mahasiswa yang diuji sebagaimana terlampir;</td> --}}
                </tr>
                <tr>
                    <td valign="top" width="13%">KEDUA</td>
                    <td valign="top" width="8%">:</td>
                    <td valign="top" width="3%"></td>
                    <td align="justify" colspan="2">Tugas panitia : </td>
                </tr>
                <tr>
                    <td valign="top" width="13%"></td>
                    <td valign="top" width="8%"></td>
                    <td valign="top" width="3%"></td>
                    <td align="justify" colspan="2">
                        <ul>
                            <li>
                                Melaksanakan tugas sesuai dengan fungsi jabatan masing-masing selama ujian berlangsung dan mempertanggungjawabkan serta melaporkan hasilnya kepada Dekan Fakultas Sastra Dan Budaya Universitas Negeri Gorontalo;
                                {{-- Melaksanakan tugas sesuai dengan fungsi jabatan masing-masing selama ujian berlangsung dan mempertanggungjawabkan serta melaporkan hasilnya kepada Dekan Fakultas {{ ucwords($seminar_decree->department->faculty->faculty_name) }} Universitas Negeri Gorontalo; --}}
                            </li>
                            <li>
                                Melaksanakan ujian komprensif kepada peserta ujian sesuai yang tercantum dalam lampiran surat keputusan ini;
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td valign="top" width="13%">KETIGA</td>
                    <td valign="top" width="8%">:</td>
                    <td valign="top" width="3%"></td>
                    <td align="justify" colspan="2">Keputusan ini berlaku sejak ditetapkan sampai dengan berakhirnya proses pelaksanaan ujian dan diberikan kepada yang bersangkutan, untuk dilaksanakan dengan penuh tangggung jawab.</td>
                </tr>
                <tr>
                    <td valign="top" width="13%">KEEMPAT</td>
                    <td valign="top" width="8%">:</td>
                    <td valign="top" width="3%"></td>
                    <td align="justify" colspan="2">Apabila dikemudian hari terdapat kekeliruan didalam penetapan ini, maka akan ditinjau dan di perbaiki kembali.</td>
                </tr>
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
                    <td width="40%">pada tanggal {{ date('d ', strtotime($seminar_decree->decree_date)).ucwords(strtolower($bulan[date('n', strtotime($seminar_decree->decree_date))])).date(' Y', strtotime($seminar_decree->decree_date)) }}</td>
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
                    <td width="40%">{{ $seminar_decree->department->faculty->faculty_officer->where('occupation', 'dekan')->first()->titleless_name ?? '-' }}</td>
                </tr>
                <tr>
                    <td width="60%"></td>
                    <td width="40%">NIP. {{ $seminar_decree->department->faculty->faculty_officer->where('occupation', 'dekan')->first()->personnel->nip ?? '-' }}</td>
                </tr>
            </table>
        </div>
        <div class="row">
            <table width="100%">
                <tr>
                    <td>Tembusan Yth. <br>
                        <ol>
                            <li>Rektor</li>
                            <li>Wakil Rektor Bidang Akademik</li>
                            <li>Kepala Biro Akademik Kemahasiswaan dan Perencanaan</li>
                            <li>Ketua Program Studi {{ ucwords($seminar_decree->seminar->first()->registration->thesis->student->study_program->study_program) }}</li>
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
        <p style="font-size: 16px">LAMPIRAN <br> KEPUTUSAN DEKAN FAKULTAS SASTRA DAN BUDAYA UNG<br>
            {{-- <p style="font-size: 16px">LAMPIRAN <br> KEPUTUSAN DEKAN FAKULTAS {{ strtoupper($seminar_decree->department->faculty->faculty_name) }} UNG<br> --}}
            {{-- todo : sebelum perubahan pada tanggal 1-januari --}}
            {{-- NOMOR {{ $seminar_decree->invitation_letter_number }}<br>
            TANGGAL {{ date('d-m-Y', strtotime($seminar_decree->invitation_letter_date)) }}<br> --}}

            {{-- todo : setelah di ubah pada tgl 1 januari (saran dari pak wadek)--}}
            NOMOR {{ $seminar_decree->decree_number }}<br>
            TANGGAL {{ date('d-m-Y', strtotime($seminar_decree->decree_date)) }}<br>
            PANITIA DAN DOSEN PENGUJI UJIAN KOMPREHENSIF PROGRAM S1 BAGI MAHASISWA JALUR SKRIPSI PROGRAM STUDI {{ strtoupper($seminar_decree->seminar->first()->registration->thesis->student->study_program->study_program) }} FAKULTAS SASTRA DAN BUDAYA UNIVERSITAS NEGERI GORONTALO</p>
        {{-- PANITIA DAN DOSEN PENGUJI UJIAN KOMPREHENSIF PROGRAM S1 BAGI MAHASISWA JALUR SKRIPSI PROGRAM STUDI PENDIDIKAN BAHASA DAN SASTRA INDONESIA FAKULTAS {{ strtoupper($seminar_decree->department->faculty->faculty_name) }} UNIVERSITAS NEGERI GORONTALO</p> --}}
    </div>

    <div class="row" style="margin-top: 40px">
        <table width="100%">
            <tr>
                <td width="2%"><strong>I.</strong></td>
                <td width="98%" colspan="4"><strong>Panitia</strong></td>
            </tr>
        </table>
        <table width="100%">
            @forelse ($seminar_decree->seminar->first()->registration->registration_periode->committee->committee_member as $item)
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
        <table width="100%">
            <tr>
                <td width="2%"><strong>II.</strong></td>
                <td width="98%" colspan="4"><strong>Peserta Ujian Komprehensif</strong></td>
            </tr>
        </table>
        <table width="100%" style="border :1px solid black; border-collapse: collapse;">
            <tr style="border :1px solid black; border-collapse: collapse; padding : 6px;">
                <th width="5%" style="border :1px solid black; border-collapse: collapse; padding : 6px;">NO</th>
                <th width="20%" style="border :1px solid black; border-collapse: collapse; padding : 6px;">NAMA MAHASISWA</th>
                <th width="40%" style="border :1px solid black; border-collapse: collapse; padding : 6px;">JUDUL SKRIPSI</th>
                <th style="border :1px solid black; border-collapse: collapse; padding : 6px;">PENGUJI</th>
            </tr>
            @forelse($seminar_decree->seminar as $key => $value)
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
                <td width="40%">{{ $seminar_decree->department->faculty->faculty_officer->where('occupation', 'dekan')->first()->titleless_name ?? '-' }}</td>
            </tr>
            <tr>
                <td width="60%"></td>
                <td width="40%">NIP. {{ $seminar_decree->department->faculty->faculty_officer->where('occupation', 'dekan')->first()->personnel->nip ?? '-' }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
