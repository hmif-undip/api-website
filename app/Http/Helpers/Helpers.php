<?php

use App\Models\websiteProfile;

function website_profile(){
    $website_profile = websiteProfile::first();

    return $website_profile;
}
