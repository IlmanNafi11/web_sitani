<?php
namespace App\services;

use App\Repositories\Interfaces\AuthPhone;

class AuthPhoneService {
    protected $authPhone;

    public function __construct(AuthPhone $authPhone) {
        $this->authPhone = $authPhone;
    }

    public function authenticate($phone) {

        return $this->authPhone->authPhone( $phone );
    }

}
