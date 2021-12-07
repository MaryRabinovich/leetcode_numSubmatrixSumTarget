<?php

namespace App;

class MatrixUtils
{
    /**
     * @param integer[][] $matrix not empty
     * @param integer $target
     * @return integer
     */
    static public function numInrowSubarraysSumTarget($matrix, $target)
    {
        $num = 0;

        foreach ($matrix as $row) 
            $num += ArrayUtils::numSubarraysSumTarget($row, $target);

        return $num;
    }

    /**
     * @param integer[][] $first  not empty
     * @param integer[][] $second not empty, same dimensions as $first
     * @return integer[][]        not empty  
     */
    static public function sumTwoMatrix(array $first, array $second)
    {
        foreach ($first as $key => $row)
            foreach ($row as $column => $cell)
                $first[$key][$column] += $second[$key][$column];
        
        return $first;
    }
}
