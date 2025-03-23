<?php
namespace App\Repositories;

use App\Models\PenyuluhTerdaftar;
use App\Repositories\Interfaces\AuthPhone;

class AuthPhoneRepository implements AuthPhone{

    public function authPhone($phone){
        return PenyuluhTerdaftar::where('no_hp', $phone)->first();
    }
}
