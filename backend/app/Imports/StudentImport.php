<?php

namespace App\Imports;

use App\Models\{Student, User, Study_programs, AcademicAdvisors};
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Hash;
use Maatwebsite\Excel\Concerns\ToCollection;

class StudentImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public $study_program_id = '';
    public $dosen_pa = '';

    public function  __construct($study_program_id, $dosen_pa)
    {
        $this->study_program_id= $study_program_id;
        $this->dosen_pa = $dosen_pa;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) 
        {
            if($index != 0 && ($row[0] != '') && ($row[1] != '')){
                $student = Student::create([
                    'fullname' => $row[0],
                    'sex' => $row[1],
                    'nim' => $row[2],
                    'class_year' => $row[3],
                    'birthplace' => $row[4],
                    'birthdate' => $this->convDate($row[5]),
                    'handphone' => $row[6],
                    'study_program_id' => $this->study_program_id,
                    'user_id' => User::firstOrCreate([
                        'email' => $row[7],
                        'username' => $row[2],
                        'password' => Hash::make($row[2]),
                    ])->id,
                    'is_active' => $row[8]
                ]);
                $student->user->assignRole('student');
                $pa = AcademicAdvisors::create([
                    'personnel_id' => $this->dosen_pa,
                    'student_id' => $student->id
                ]);
            }
        }
        
    }

    private function convDate($date)
    {
        // $explode = explode('/',$date);
        // $new_date = $explode[2] . '-' . $explode[1] . '-' . $explode [0] . ' 00:00:00';
        // return $new_date;

        $base_timestamp = mktime(0,0,0,1,(int) $date-1,1900);
        return date("Y-m-d", $base_timestamp);
    }
}
