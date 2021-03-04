<?php

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


function singkat($kata)
{
    $abbreviation = "";
    $string = ucwords($kata);
    $words = explode(" ", "$kata");
    foreach ($words as $word) {
        $abbreviation .= $word[0];
    }
    return $abbreviation;
}

function capslock($kata)
{
    $yourString = strtoupper($kata);
    $vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", " ");
    $yourString = str_replace($vowels, "", $yourString);
    return $yourString;
}

function latestid($db)
{
    $raw = DB::table($db)
        ->latest()
        ->first();
    // return json_encode($raw);
    return $raw->id;
}

function datenow($date){
    $tanggal = Carbon::parse($date)->diffForHumans();
    return $tanggal;
}

