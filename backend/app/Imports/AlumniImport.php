<?php

namespace App\Imports;

use App\Models\Alumni;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class AlumniImport implements ToCollection
{
    public $study_program_id = '';

    public function  __construct($study_program_id)
    {
        $this->study_program_id= $study_program_id;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) 
        {
            if($index != 0 && ($row[0] != '') && ($row[1] != '')){
                $alumni = Alumni::create([
                    'fullname' => $row[0],
                    'nim' => $row[1],
                    'birthdate' => $this->convDate($row[2]),
                    'diploma_number' => $row[3],
                    'thesis_title' => $row[4],
                    'study_program_id' => $this->study_program_id,
                    'thesis_guides' => $row[5],
                    'graduation_date' => $this->convDate($row[6]),
                ]);
                // $alumni->user->assignRole('tau');
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
