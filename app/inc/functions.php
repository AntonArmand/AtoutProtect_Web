<?php

function hashage($passe)
{
	return hash('sha256', hash('sha256', 10 . $passe));
}


function generate_license() {

    $num_segments = 4;
    $segment_chars = 4;

    $tokens = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
    $license_string = '';

    for ($i = 0; $i < $num_segments; $i++) {
        $segment = '';
        for ($j = 0; $j < $segment_chars; $j++) {
            $segment .= $tokens[rand(0, strlen($tokens)-1)];
        }
        $license_string .= $segment;
        if ($i < ($num_segments - 1)) {
            $license_string .= '-';
        }
    }
     return $license_string;
}

?>