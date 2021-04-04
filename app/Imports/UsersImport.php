<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\User;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name' => $row[1],
            'username' => $row[2],
            'email' => $row[3],
            'password' => bcrypt('password'),
            'level' => $row[5],
        ]);
    }
}
