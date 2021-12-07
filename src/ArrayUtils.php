<?php

namespace App;

class ArrayUtils
{
    /**
     * @param integer[] $array not empty
     * @param integer[] $target
     * @return integer
     */
    static public function numSubarraysSumTarget($array, $target)
    {
        $hashTable = self::buildLeftSubarraysSumsHashTable($array);
        
        $num = array_key_exists($target, $hashTable) ? count($hashTable[$target]) : 0;

        foreach ($hashTable as $leftValue => $leftArray) {

            $rightValue = $leftValue + $target;
            
            if (!array_key_exists($rightValue, $hashTable)) continue;

            $rightArray = $hashTable[$rightValue];
            $num += self::numCouplesWhereFirstIsSmaller($leftArray, $rightArray);
        }

        return $num;
    }


    /**
     * @param integer[] $array not empty
     * @return integer[][]
     */
    static public function buildLeftSubarraysSumsHashTable($array)
    {
        $hashTable = [];

        $sum = 0;

        foreach ($array as $key => $value) {

            $sum += $value;

            if (array_key_exists($sum, $hashTable)) $hashTable[$sum][] = $key;
            else $hashTable[$sum] = [$key];
        }

        return $hashTable;
    }


    /**
     * @param integer[] $first  sorted in ascendent order, strictly growing
     * @param integer[] $second sorted in ascendent order, strictly growing
     * @return integer
     */
    static public function numCouplesWhereFirstIsSmaller($first, $second)
    {
        $num = 0;

        $key = 0;
        $lastKey = count($second) - 1;

        foreach ($first as $value) {

            while ($second[$key] <= $value) {
                $key++;
                if ($key > $lastKey) return $num;
            }

            $num += $lastKey - $key + 1;
        }

        return $num;
    }
}
