<?php

use Illuminate\Support\Facades\File;

define('pagination_count', 25);

function getPhoto($dossier, $val)
{
    return $val !== null ? asset('images/' . $dossier . '/' . $val) : "assets/media/svg/avatars/blank.svg";
}

