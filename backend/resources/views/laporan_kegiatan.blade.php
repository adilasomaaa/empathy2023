<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <title>Laporan Umum</title>
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
    <div class="">
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
                        @php
                            $fakultas = $seminar->first()->registration->registration_period->stage->department->faculty->faculty_name ?? '';
                            $jurusan = $seminar->first()->registration->thesis->student->study_program->department->department_name ?? '';
                        @endphp
                        <strong>FAKULTAS SASTRA DAN BUDAYA</strong><br>
                        {{-- <strong>FAKULTAS {{ strtoupper($fakultas) }}</strong><br> --}}
                        @php
                            $alamat = str_replace('Kecamatan', '<br> Kecamatan',$seminar->first()->seminar_decree->department->faculty->address);
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
                        <strong>LAPORAN UMUM KEGIATAN DOSEN</strong><br>
                        <strong>JURUSAN {{ strtoupper($jurusan) }}</strong><br>
                        {{-- <strong>FAKULTAS {{ strtoupper($fakultas) }}</strong> --}}
                    </p>
                </center>
            </div>
            <table width="100%" align="center" style=" border-collapse: collapse; border: 1px solid black; font-size: 10px" >

                <tr>
                    <th style="border: 1px solid black" width="5%">No</th>
                    <th style="border: 1px solid black" width="20%">Nama</th>
                    <th style="border: 1px solid black" width="">Judul</th>
                    <th style="border: 1px solid black" width="">Penguji</th>
                    <th style="border: 1px solid black" width="">Tahun</th>
                    <th style="border: 1px solid black" width="">Tahapan</th>
                    <th style="border: 1px solid black" width="5%">No Surat</th>
                </tr>

                @forelse ($seminar as $key => $list)
                    <tr>
                        <td style="border: 1px solid black" align="center" width="5%">{{ ++$key }}</td>
                        <td style="border: 1px solid black; padding : 10px" width="20%">
                            {{ $list->registration->thesis->student->fullname }}
                        </td>
                        <td style="border: 1px solid black; padding : 10px" align="center" width="">
                            {{ $list->registration->thesis->title }}
                        </td>
                        <td style="border: 1px solid black; padding : 10px" align="center" width="">
                            @forelse ($list->examiner as $no_dosen => $dosen)
                                {{ ++$no_dosen }}. {{ $dosen->personnel->fullname }} <br>
                            @empty
                                
                            @endforelse
                        </td>
                        <td style="border: 1px solid black; padding : 10px" align="center" width="">{{ date('Y', strtotime('Y', strtotime($list->tgl_ujian))) }}</td>
                        <td style="border: 1px solid black; padding : 10px"  align="center" width="">{{ $list->registration->registration_period->stage->stage_name }}</td>
                        <td style="border: 1px solid black; padding : 10px"  align="center" width="">{{ $list->seminar_decree->decree_number ?? '' }}</td>
                    </tr>
                @empty
                    
                @endforelse

            </table>
        </div>
        {{-- <div class="row" style="margin-top: 20px">
            
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
                    <td width="40%"></td>
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
        </div> --}}
    </div>
</body>

</html>

