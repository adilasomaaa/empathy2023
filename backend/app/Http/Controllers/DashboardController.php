<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Book;
use App\Models\Department;
use App\Models\Personnel;
use App\Models\Research_and_service;
use App\Models\Scientific_seminar;
use App\Models\Scientific_work;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DashboardController extends Controller
{

   
    public function coba()
    {
        return date('n', strtotime(now()));
    }
    
    public function personnel()
    {
        $count_dosen = Personnel::count();
        $count_dosen_status = Personnel::select('status', DB::raw('count(*) as total'))
        ->groupBy('status')->get();

        $count_dosen_department = Personnel::join('departments', 'departments.id', '=', 'personnels.department_id')
        ->select('departments.department_name', DB::raw('count(*) as total'))
        ->groupBy('departments.department_name')->get();

        $count_dosen_department_byStatus = Personnel::join('departments', 'departments.id', '=', 'personnels.department_id')
        ->select('departments.department_name','personnels.status', DB::raw('count(*) as total'))
        ->groupBy('departments.department_name')
        ->groupBy('personnels.status')
        ->get();
        
        return response()->json([
            'dosen' => $count_dosen,
            'dosenByStatus' => $count_dosen_status,
            'dosen_department' => $count_dosen_department,
            'dosen_departmentByStatus' => $count_dosen_department_byStatus,
        ]);
    }

    public function dokumen()
    {
        $total_buku = Book::count();
        $buku_per_tahun = Book::select('year', DB::raw('count(*) as total'))
        ->groupBy('year')->get();
        
        $total_seminar_ilmiah = Scientific_seminar::count();
        $seminar_ilmiah_per_tahun = Scientific_seminar::select('year', DB::raw('count(*) as total'))
        ->groupBy('year')->orderBY('year','asc')->get();

        $total_karya_ilmiah = Scientific_work::count();
        $karya_ilmiah_per_tahun = Scientific_work::select('year', DB::raw('count(*) as total'))
        ->groupBy('year')->orderBY('year','asc')->get();

        $total_penelitian = Research_and_service::where('status', 'penelitian')->count();
        $penelitian_per_tahun = Research_and_service::where('status', 'penelitian')->select('year', DB::raw('count(*) as total'))
        ->groupBy('year')->orderBY('year','asc')->get();

        $total_pengabdian = Research_and_service::where('status', 'pengabdian')->count();
        $pengabdian_per_tahun = Research_and_service::where('status', 'pengabdian')->select('year', DB::raw('count(*) as total'))
        ->groupBy('year')->orderBY('year','asc')->get();

        return response()->json([
            'total_dokumen' => $total_buku+$total_pengabdian+$total_penelitian+$total_seminar_ilmiah+$total_karya_ilmiah,

            'total_pengabdian' => $total_pengabdian,
            'pengabdian_per_tahun' => $pengabdian_per_tahun,

            'total_penelitian' => $total_penelitian,
            'penelitian_per_tahun' => $penelitian_per_tahun,

            'total_buku' => $total_buku,
            'buku_per_tahun' => $buku_per_tahun,

            'total_seminar_ilmiah' => $total_seminar_ilmiah,
            'seminar_ilmiah_per_tahun' => $seminar_ilmiah_per_tahun,

            'total_karya_ilmiah' => $total_karya_ilmiah,
            'karya_ilmiah_per_tahun' => $karya_ilmiah_per_tahun,

        ]);
    }

    public function alumni()
    {
        $alumni = Alumni::count();
        $alumni_department = Alumni::join('study_programs', 'study_programs.id', '=' , 'alumnis.study_program_id')->join('departments', 'departments.id','=','study_programs.department_id')
        ->select('departments.department_name', DB::raw('count(*) as total'))
        ->groupBy('departments.department_name')->get();
        
        return response()->json([
            'alumni' => $alumni,
            'alumni_department' => $alumni_department,
        ]);
    }
    
    public function student()
    {
        $count_student = Student::count();
        $count_student_department = Student::join('study_programs', 'study_programs.id', '=' , 'students.study_program_id')->join('departments', 'departments.id','=','study_programs.department_id')
        ->select('departments.department_name', DB::raw('count(*) as total'))
        ->groupBy('departments.department_name')->get();
        
        return response()->json([
            'student' => $count_student,
            'student_department' => $count_student_department,
        ]);
    }
}
