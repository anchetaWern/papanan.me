<?php

function img($var) {
    return is_object($var) ? $var->temporaryUrl() : asset('/photos/' . $var);
}
