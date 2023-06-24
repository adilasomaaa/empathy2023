<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <title>Laporan Bimbingan</title>
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
                        {{-- @php
                            $fakultas = $thesis->first()->thesis_guide_decree->department->faculty->faculty_name ?? '';
                        @endphp --}}
                        <strong>FAKULTAS SASTRA DAN BUDAYA</strong><br>
                        {{-- <strong>FAKULTAS {{ strtoupper($fakultas) }}</strong><br> --}}
                        {{-- @php
                            $alamat = str_replace('Kecamatan', '<br> Kecamatan',$seminar->seminar_decree->department->faculty->address);
                        @endphp --}}
                        {{-- {!! $alamat !!}<br> --}}
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
                        <strong>LAPORAN UMUM BIMBINGAN DOSEN</strong><br>
                        <strong>FAKULTAS SASTRA DAN BUDAYA</strong>
                        {{-- <strong>FAKULTAS {{ strtoupper($fakultas) }}</strong> --}}
                    </p>
                </center>
            </div>
            <table width="100%" align="center" style=" border-collapse: collapse; border: 1px solid black; font-size: 10px" >

                <tr>
                    <th style="border: 1px solid black" width="5%">No</th>
                    <th style="border: 1px solid black" width="20%">Dosen</th>
                    <th style="border: 1px solid black" width="">Tahun</th>
                    <th style="border: 1px solid black" width="">Skripsi</th>
                    <th style="border: 1px solid black" width="">Jurusan</th>
                    <th style="border: 1px solid black" width="5%">No Surat</th>
                </tr>

                @forelse ($thesis as $key => $list)
                    <tr>
                        <td style="border: 1px solid black" align="center" width="5%">{{ ++$key.' '.$list->id }}</td>
                        <td style="border: 1px solid black; padding : 10px" width="20%">
                            @forelse ($list->thesis_guide as $no_dosen => $dosen)
                                {{ ++$no_dosen }}. {{ $dosen->personnel->fullname }} <br>
                            @empty
                            @endforelse
                        </td>
                        <td style="border: 1px solid black; padding : 10px" align="center" width="">{{ date('Y', strtotime('Y', strtotime($list->thesis_guide_decree->decree_date))) }}</td>
                        <td style="border: 1px solid black; padding : 10px" align="center" width="">{{ $list->title }}</td>
                        <td style="border: 1px solid black; padding : 10px" align="center" width="">{{ $list->thesis_guide->first()->personnel->department->department_name ?? '' }}</td>
                        <td style="border: 1px solid black; padding : 10px"  align="center" width="">{{ $list->thesis_guide_decree->decree_number }}</td>
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

