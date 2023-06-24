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
                        Alamat : {!! $alamat !!}
                        <br>
                        <strong>Laman</strong> www.ung.ac.id<br>
                    </p>
                </td>
                <td width= "15%"></td>
            </tr>
        </table>
        <hr style="border: 2px solid black; margin-top: -10px">
        <div class="row" style="margin-top: 10px">
            <table width="100%">
                <tr>
                    <td width="10%">LAMPIRAN</td>
                    <td width="auto">: KEPUTUSAN DEKAN FAKULTAS SASTRA DAN BUDAYA</td>
                    {{-- <td width="auto">: KEPUTUSAN DEKAN FAKULTAS {{ strtoupper($fakultas) }}</td> --}}
                </tr>
                <tr>
                    <td width="">NOMOR</td>
                    <td>: {{ $bachelor_degree_decree->no_sk }}</td>
                </tr>
                <tr>
                    <td width="">TENTANG</td>
                    <td>: PENETAPAN YUDISIUM PROGRAM SARJANA (S1) PRODI {{ strtoupper($prodi) }}</td>
                </tr>
                <tr>
                    <td width="">TANGGAL</td>
                    <td>: {{ date('d ', strtotime($bachelor_degree_decree->graduation_date)).strtoupper($bulan[date('n', strtotime($bachelor_degree_decree->graduation_date))]).date(' Y', strtotime($bachelor_degree_decree->graduation_date)) }}</td>
                </tr>
            </table>
        </div>
        
        <div class="row"  >
            <table width="100%" style="margin-top: 10px; border: 1px solid black; border-collapse: collapse; font-size: 15px">
                <tr style="border: 1px solid black; border-collapse: collapse; font-size: 13px">
                    <th align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px" rowspan="2">No</th>
                    <th align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px" rowspan="2">Nama Mahasiswa</th>
                    <th align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px" rowspan="2">NIM</th>
                    <th align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px" rowspan="2">Angkatan</th>
                    <th align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px" rowspan="2">Jmlh SKS</th>
                    <th align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px" colspan="2">IPK</th>
                    <th align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px" colspan="2">Nilai Komprehensif</th>
                    <th align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px" rowspan="2">Total SKS</th>
                    <th align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px" rowspan="2">Rata-Rata Index Yudisium</th>
                    <th align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px" rowspan="2">Predikat</th>
                    <th align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px" rowspan="2">Lama Studi</th>
                    <th align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px" rowspan="2">Lama Bimbingan</th>
                    <th align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px" rowspan="2">No. SK Bimbingan</th>
                    <th align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px" rowspan="2">Tanggal SK
                    </th>
                </tr>
                <tr style="border: 1px solid black; border-collapse: collapse; font-size: 13px">
                    <th align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px">Total KxN</th>
                    <th align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px">IPK</th>
                    <th align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px">Total Nilai</th>
                    <th align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px">Nilai</th>
                </tr>

                
                @forelse ($bachelor_degree as $key => $item)
                    <tr style="border: 1px solid black; border-collapse: collapse; font-size: 13px">
                        <td align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px">{{ ++$key }}</td>
                        <td align="left" style="border: 1px solid black; border-collapse: collapse; font-size: 13px">{{ $item->student->fullname }}</td>
                        <td align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px">{{ $item->student->nim }}</td>
                        <td align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px">{{ $item->student->class_year }}</td>
                        <td align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px">{{ $item->student->thesis->registrationByDesc->first()->laststageregistration->jumlah_sks }}</td>
                        <td align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px">{{ $item->total_kxn }}</td>
                        <td align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px">{{ $item->student->thesis->registrationByDesc->first()->laststageregistration->ipk }}</td>
                        <td align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px">{{ $item->total_nilai_komprehensif }}</td>
                        <td align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px">{{ $item->nilai_angka_komprehensif }}</td>
                        <td align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px">{{ $item->student->thesis->registrationByDesc->first()->laststageregistration->jumlah_sks + 6 }}</td>
                        <td align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px">{{ $item->rerata_index_yudisium }}</td>
                        <td align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px">{{ $item->predikat ?? ' ' }}</td>
                        <td align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px">
                            {{ intval((int)$item->lama_studi / 12) > 0 ? intval((int)$item->lama_studi / 12).' Tahun' : '' }} {{ intval((int)$item->lama_studi / 12) < 7 ? $item->lama_studi % 12 > 0 ? $item->lama_studi % 12 .' Bulan' : '' : ''  }}
                        </td>
                        <td align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px">{{ intval((int)$item->lama_bimbingan / 12) > 0 ? intval((int)$item->lama_bimbingan / 12).' Tahun' : '' }} {{ $item->lama_bimbingan % 12 > 0 ? $item->lama_bimbingan % 12 .' Bulan' : ''  }}</td>
                        <td align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px">{{ $item->student->thesis->thesis_guide_decree->decree_number}}</td>
                        <td align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 13px">{{ date('d-m-Y', strtotime($item->student->thesis->thesis_guide_decree->decree_date)) }}</td>
                    </tr>
                @empty
                    
                @endforelse

            </table>
        </div>
        <div class="row" style="margin-top: 20px">
            
            <table width= "100%">
                <tr>
                    <td width="73%"></td>
                    <td width="10%">Ditetapkan di </td>
                    <td>: Gorontalo</td>
                </tr>
                <tr>
                    <td></td>
                    <td >Pada Tanggal </td>
                    <td>: {{ date('d ', strtotime($bachelor_degree_decree->graduation_date)).ucwords(strtolower($bulan[date('n', strtotime($bachelor_degree_decree->graduation_date))])).date(' Y', strtotime($bachelor_degree_decree->graduation_date)) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2" style="border-top: 1px solid black; padding-top : 5px" width="30%">DEKAN,</td>
                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 40px">
            <table width= "100%">
                <tr>
                    <td width="73%"></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="row">
            <table width= "100%">
                <tr>
                    <td width="73%"></td>
                    <td>{{ strtoupper($bachelor_degree_decree->department->faculty->faculty_officer->where('occupation', 'dekan')->first()->titleless_name ?? '-') }}</td>
                </tr>
                <tr>
                    <td ></td>
                    <td>NIP. {{ $bachelor_degree_decree->department->faculty->faculty_officer->where('occupation', 'dekan')->first()->personnel->nip ?? '-' }}</td>
                </tr>
            </table>
        </div>
        
    </div>
</body>

</html>

