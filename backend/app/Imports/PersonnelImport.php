<?php

namespace App\Imports;

use App\Models\{Personnel, User, Department};
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Hash;
use Maatwebsite\Excel\Concerns\ToCollection;

class PersonnelImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public $department_id = '';

    public function  __construct($department_id)
    {
        $this->department_id= $department_id;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) 
        {
            if($index != 0 && ($row[0] != '') && ($row[1] != '')){
                $personnel = Personnel::create([
                    'fullname' => $row[0],
                    'sex' => $row[1],
                    'nip' => $row[2],
                    'nidn' => $row[3],
                    'birthplace' => $row[4],
                    'birthdate' => $this->convDate($row[5]),
                    'education' => $row[6],
                    'address' => $row[7],
                    'handphone' => $row[8],
                    'department_id' => $this->department_id,
                    'user_id' => User::firstOrCreate([
                        'email' => $row[9],
                        'username' => $row[2],
                        'password' => Hash::make($row[2]),
                    ])->id,
                ]);
                $personnel->user->assignRole('personnel');
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
