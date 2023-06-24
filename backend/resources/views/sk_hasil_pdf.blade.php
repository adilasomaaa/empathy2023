<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <title>SK SEMINAR HASIL</title>
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
                        <strong>FAKULTAS SASTRA DAN BUDAYA</strong><br>
                        {{-- <strong>FAKULTAS {{ strtoupper($seminar_decree->department->faculty->faculty_name) }}</strong><br> --}}
                        @php
                        $alamat = str_replace('Kecamatan', '<br> Kecamatan',$seminar_decree->department->faculty->address);
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
                <p><strong>SURAT PENUNJUKKAN</strong><br> NOMOR : {{ $seminar_decree->decree_number }} </p>
                {{-- <span style="margin-top: 30px">
                        TENTANG<br>PENETAPAN MAHASISWA PROGRAM S1 BAGI MAHASISWA JALUR SKRIPSI PROGRAM STUDI PENDIDIKAN BAHASA DAN SASTRA INDONESIA DAN PENUNJUKAN DOSEN PEMBIMBING SKRIPSI FAKULTAS {{ strtoupper($seminar_decree->department->faculty->faculty_name) }} UNIVERSITAS NEGERI GORONTALO
                </span> --}}
            </center>

            <p>Ketua Jurusan {{ ucwords($seminar_decree->department->department_name) }} Menunjuk Panitia, Penguji dan Peserta Seminar Hasil Penelitian bagi mahasiswa dengan uraian sebagai berikut.</p>

        </div>

        <div class="row" style="margin-top: 40px">
            <table width="100%">
                <tr>
                    <td width="2%"><strong>I.</strong></td>
                    <td width="98%" colspan="4"><strong>Panitai Seminar Hasil Penelitian</strong></td>
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
                    <td width="98%" colspan="4"><strong>Panitia Seminar Hasil Penelitian dan Penguji</strong></td>
                </tr>
            </table>
            <table width="100%" style="border :1px solid black; border-collapse: collapse;">
                <tr style="border :1px solid black; border-collapse: collapse; padding : 6px;">
                    <th width="5%" style="border :1px solid black; border-collapse: collapse; padding : 6px;">NO</th>
                    <th width="20%" style="border :1px solid black; border-collapse: collapse; padding : 6px;">NAMA MAHASISWA</th>
                    <th width="40%" style="border :1px solid black; border-collapse: collapse; padding : 6px;">JUDUL</th>
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
                    <td style="border :1px solid black; border-collapse: collapse; padding : 1px;">
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
            <table width="100%">

                <tr>
                    <td width="60%"></td>
                    <td width="40%">Gorontalo {{ date('d ', strtotime($seminar_decree->decree_date)).ucwords(strtolower($bulan[date('n', strtotime($seminar_decree->decree_date))])).date(' Y', strtotime($seminar_decree->decree_date)) }}</td>
                </tr>
                <tr>
                    <td width="60%"></td>
                    <td width="40%">Kajur,</td>
                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 0px">
            <table width="100%">
                <tr>
                    <td width="60%"></td>
                    <td width="40%">
                        <img src="data:image/png;base64, {!! $qrcode !!}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="row">
            <table width="100%">
                <tr>
                    <td width="60%"></td>
                    <td width="40%">{{ $seminar_decree->department->department_officer->where('occupation', 'kajur')->first()->personnel->fullname ?? '-' }}</td>
                </tr>
                <tr>
                    <td width="60%"></td>
                    <td width="40%">NIP. {{ $seminar_decree->department->department_officer->where('occupation', 'kajur')->first()->personnel->nip ?? '-' }}</td>
                </tr>
            </table>
        </div>

</body>

</html>
