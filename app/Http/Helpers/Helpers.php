<?php

use App\Models\User;
use App\Models\WebsiteProfile;

function website_profile(){
    $website_profile = WebsiteProfile::first();

    return $website_profile;
}

function count_users(){
    $count_users = User::count();

    return $count_users;
}
