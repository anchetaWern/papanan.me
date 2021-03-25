<?php

function img($var) {
    return is_object($var) ? $var->temporaryUrl() : asset('/photos/' . $var);
}

function friendlyText($str) {
    return ucfirst(str_replace('_', ' ', $str));
}
