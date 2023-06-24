<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <title>{{ 'Jadwal Ujian' }}</title>
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
    <div class="row" style="">
        <table width="100%">
            <tr>
                <td width="100%" align="center" colspan="4"><strong>JADWAL UJIAN {{ strtoupper($seminar->registration->registration_periode->stage->stage_name) }}</strong></td>
            </tr>
            <tr>
                <td width="100%" align="center" colspan="4"><strong>PROGRAM STUDI {{ strtoupper($seminar->first()->registration->thesis->student->study_program->study_program) }}</strong></td>
            </tr>
        </table>
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
        <br>
        <table width="100%" style="border :0px solid black; border-collapse: collapse;">
            <tr style="border :0px solid black; border-collapse: collapse; padding : 6px;">
                <th align="left" style="border :0px solid black; border-collapse: collapse; padding : 6px;">
                    {{ $hari[date('D', strtotime($seminar->tgl_ujian))].', '.date('d ', strtotime($seminar->tgl_ujian)).$bulan[date('n',strtotime($seminar->tgl_ujian))].' '.date('Y', strtotime($seminar->tgl_ujian)) }}
                </th>
            </tr>
        </table>
        <table width="100%" style="border :1px solid black; border-collapse: collapse;">
            <tr style="border :1px solid black; border-collapse: collapse; padding : 6px;">
                <th width="5%" style="border :1px solid black; border-collapse: collapse; padding : 6px;">NO</th>
                <th width="15%" style="border :1px solid black; border-collapse: collapse; padding : 6px;">NAMA MAHASISWA</th>
                <th width="20%" style="border :1px solid black; border-collapse: collapse; padding : 6px;">JUDUL PROPOSAL</th>
                <th width="30%" style="border :1px solid black; border-collapse: collapse; padding : 6px;">TIM PENGUJI</th>
                <th width="20%" style="border :1px solid black; border-collapse: collapse; padding : 6px;">HARI.TGL.WAKTU</th>
                <th width="10%" style="border :1px solid black; border-collapse: collapse; padding : 6px;">TEMPAT</th>
            </tr>
            @forelse($seminars as $key => $value)
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
                <td style="border :1px solid black; border-collapse: collapse; padding : 6px;">
                    {{ $hari[date('D', strtotime($value->tgl_ujian))].', '.date('d ', strtotime($value->tgl_ujian)).$bulan[date('n',strtotime($value->tgl_ujian))].' '.date('Y', strtotime($value->tgl_ujian)) }} <br>
                    Pukul : {{ date('G:i', strtotime($value->waktu_mulai)).'-'. date('G:i', strtotime($value->waktu_selesai)) }}
                </td>
                <td style="border :1px solid black; border-collapse: collapse; padding : 6px;">
                    {{ $value->tempat }}
                </td>
            </tr>
            @empty

            @endforelse

        </table>
    </div>


    @if (Request::segment(4) == 'halaman')
    <script>
        window.print();

    </script>
    @endif
</body>

</html>
