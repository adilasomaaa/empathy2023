<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

        * {
            font-family: "Bookman Old Style", serif;
        }

        table {
            /* font-size: 16px; */
            /* font-size: 4.2333mm; */
        }

    </style>
</head>

<body style="padding: 0cm 0cm 0cm 1cm">
    @php
    $fakultas = "";

    @endphp
    <div class="row">
        <table width="100%" style="font-size: 14">
            <tr>
                <td width="15%" align="right">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/img/cop/logo.png'))) }}" width="100px" height="auto" alt="">
                </td>
                <td align="center" width="auto" style="font-size: 17px;">
                    <p style="font-size: 14">
                        KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI<br>
                        <strong>UNIVERSITAS NEGERI GORONTALO</strong><br>
                        <strong>FAKULTAS SASTRA DAN BUDAYA</strong><br>
                        {{-- <strong>FAKULTAS {{ strtoupper($alumni->first()->study_program->department->faculty->faculty_name) }}</strong><br> --}}
                        @php
                        $alamat = str_replace('Kecamatan', '<br> Kecamatan',$alumni->first()->study_program->department->faculty->address);
                        @endphp
                        {!! $alamat !!}<br>
                        Laman www.ung.ac.id<br>
                    </p>
                </td>
                <td width="15%"></td>
            </tr>
        </table>
        <hr style="border: 2px solid black; margin-top: -10px">
        <div class="row" style="font-size: 17px;">
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
            $hari = array('Sun' => 'Minggu','Mon' => 'Senin','Tue' => 'Selasa','Wed' => 'Rabu','Thu' => 'Kamis','Fri' => 'Jumat','Sat' => 'Sabtu');
            @endphp
            <center>
                <p>
                    <strong>DAFTAR ALUMNI</strong><br>
                    <strong>JURUSAN {{ strtoupper($department->department_name) }}</strong>
                </p>
            </center>

            {{-- <p style="text-align: justify; ">Pada hari ini {{ $hari[date('D', strtotime(now()))] }}, tanggal {{ date('d', strtotime(now()))}}, bulan {{ ucwords(strtolower($bulan[date('n',strtotime(now()))])) }}, tahun {{ date('Y', strtotime(now())) }} Sesuai SK Dekan Nomor {{ $seminar->seminar_decree->decree_number }} tanggal 30 bulan Juni tahun 2022 telah dilaksanakan ujian Komprehensif atas Nama :</p> --}}
        </div>

        <table width="100%" style="border :1px solid black; border-collapse: collapse;font-size: 14; margin-bottom: 10px">
            <tr style="border :1px solid black; border-collapse: collapse;">
                <th width="1%" style="border :1px solid black; border-collapse: collapse;">No</th>
                <th width="30%" style="border :1px solid black; border-collapse: collapse;">Nama </th>
                <th width="30%" style="border :1px solid black; border-collapse: collapse;">Program Studi </th>
                <th width="23%" style="border :1px solid black; border-collapse: collapse;">Tanggal Kelulusan</th>
                <th width="24%" style="border :1px solid black; border-collapse: collapse;">Tanggal Mendapatkan Kerjaan Pertama</th>
                <th width="24%" style="border :1px solid black; border-collapse: collapse;">Tempat Bekerja</th>
                <th width="23%" style="border :1px solid black; border-collapse: collapse;">Rentang Waktu</th>
            </tr>
            @forelse ($alumni as $key => $item)
            @php
            $jaraks = "-";
            if ($item->alumni_trace->first()) {
            $tgl1 = new DateTime($item->graduation_date ?? '-');
            $tgl2 = new DateTime($item->alumni_trace->first()->start_date);
            $jarak = $tgl1->diff($tgl2);
            $tahun = $jarak->y > 0 ? $jarak->y." Tahun " : "";
            $bulan = $jarak->m > 0 ? $jarak->m." Bulan" : "";
            if (date($item->graduation_date > date($item->alumni_trace->first()->start_date))) {

            $jaraks = $tahun.$bulan." yang lalu";
            }else{
            $jaraks = $tahun.$bulan;
            }
            }else{
            $jaraks = "Belum Mempunyai Pekerjaan";
            }
            @endphp
            <tr style="border :1px solid black; border-collapse: collapse;">
                <td align="center" style="border :1px solid black; border-collapse: collapse;padding:10px;">
                    {{ ++$key }}
                </td>
                <td style="border :1px solid black; border-collapse: collapse;padding:10px;">
                    {{ $item->fullname }}
                </td>
                <td style="border :1px solid black; border-collapse: collapse;padding:10px;">
                    {{ $item->study_program->study_program }}
                </td>
                <td align="center" style="border :1px solid black; border-collapse: collapse;padding:10px;">
                    {{ date('d-m-Y', strtotime($item->graduation_date)) }}
                </td>
                <td align="center" style="border :1px solid black; border-collapse: collapse;padding:10px;">
                    {{ $item->alumni_trace->first() ? date('d-m-Y', strtotime($item->alumni_trace->first()->start_date)) : 'Belum mendapatkan pekerjaan' }}
                </td>
                <td align="center" style="border :1px solid black; border-collapse: collapse;padding:10px;">
                    {{ $item->alumni_trace->place ?? ''  }}
                </td>
                <td align="center" style="border :1px solid black; border-collapse: collapse;padding:10px;">
                    {{ $jaraks ? $jaraks : '-'  }}
                </td>
            </tr>
            @empty

            @endforelse
        </table>
    </div>
</body>

</html>
