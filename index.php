<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\Solution;

$matrix = [
    [0,1,2],
    [3,4,5]
];
$target = 3;

$solution = new Solution();
echo $solution->numSubmatrixSumTarget($matrix, $target);
