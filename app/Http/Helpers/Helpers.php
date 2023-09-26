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

function ddmmyyyy($value){
    if ($value) {
        return date("d-m-Y", strtotime($value));
    }else{
        return null;
    }
}

function yyyymmdd($value){
    if ($value) {
        return date("Y-m-d", strtotime($value));
    }else{
        return null;
    }
}

function ddmmyyyy_now(){
    return date("d-m-Y");
}

function yyyymmdd_now(){
    return date("Y-m-d");
}
