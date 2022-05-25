<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImports implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array  $row)
    {
        return new User([
           'name'     => $row[0],
           'l_name'     => $row[1],
           'email'    => $row[2], 
           'phone_number'    => $row[3],
           'dashboard_style'    => $row[4],
           'password' => Hash::make($row[5]),
           'status' =>$row[6]
        ]);
    }
}
