<?php

use App\Models\User;
use App\Models\websiteProfile;

function website_profile(){
    $website_profile = websiteProfile::first();

    return $website_profile;
}

function count_users(){
    $count_users = User::count();

    return $count_users;
}
