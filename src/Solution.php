<?php

namespace App;

class Solution {

    /**
     * @param array $matrix
     * @param int $target
     * @return int
     */
    function numSubmatrixSumTarget($matrix, $target) {

        $num = 0;

        $meltingDump = $matrix;

        while (count($matrix) > 0) {

            $num += MatrixUtils::numInrowSubarraysSumTarget($matrix, $target);

            array_shift($matrix);
            array_pop($meltingDump);
            $matrix = MatrixUtils::sumTwoMatrix($matrix, $meltingDump);
        }

        return $num;
    }
}
