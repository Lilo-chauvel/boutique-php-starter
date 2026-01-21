<?php

var_dump(match (true) {
    $age > 0 && $age < 18 => 'minor',
    $age > 0 && $age < 25 => 'Young adult',
    $age > 0 && $age < 64 => 'Adult',
    default => 'Senior'
});
