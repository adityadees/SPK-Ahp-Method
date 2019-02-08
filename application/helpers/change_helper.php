<?php

function change_index_arr($jalan)
{
	$result = [];
    foreach ($jalan as $sub) {
        foreach ($sub as $k => $v) {
            $result[$k][] = $v;
        }
    }
    return $result;
}