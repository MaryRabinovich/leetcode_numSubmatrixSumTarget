<?php

namespace App;

class MatrixUtils
{
    /**
     * @param array $matrix not empty
     * @param int $target
     * @return int
     */
    static public function numInrowSubarraysSumTarget($matrix, $target)
    {
        $num = 0;

        foreach ($matrix as $row) 
            $num += ArrayUtils::numSubarraysSumTarget($row, $target);

        return $num;
    }

    /**
     * @param array $first  not empty matrix
     * @param array $second not empty matrix
     * @return array        not empty matrix  
     * 
     * $first and $second must have same dimensions
     */
    static public function sumTwoMatrix(array $first, array $second)
    {
        foreach ($first as $key => $row)
            foreach ($row as $column => $cell)
                $first[$key][$column] += $second[$key][$column];
        
        return $first;
    }
}
