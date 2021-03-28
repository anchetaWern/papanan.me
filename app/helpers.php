<?php

function img($var, $dir = '/photos/') {
    return is_object($var) ? $var->temporaryUrl() : asset($dir . $var);
}

function friendlyText($str) {
    return ucfirst(str_replace('_', ' ', $str));
}
