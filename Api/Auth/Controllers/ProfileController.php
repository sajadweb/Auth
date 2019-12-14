<?php

namespace Api\Auth\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class ProfileController extends BaseController
{
    public function getProfile()
    {
        return "getProfile";
    }

    public function editProfile()
    {
        return "editProfile";
    }

    public function updateProfile()
    {
        return "updateProfile";
    }  
}
