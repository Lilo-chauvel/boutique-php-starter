<?php
$age;

var_dump (match(true){
    0<$age && $age<18 => "minor",
    0 < $age && $age<25 => "Young adult",
    0 < $age && $age<64 => "Adult",
    default => "Senior"
})
?>