<?php

namespace App;

class ArrayUtils
{
    /**
     * @param array $array not empty
     * @param array $target
     * @return int
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
     * @param array $array not empty
     * @return array
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
     * @param array $first  sorted in ascendent order
     * @param array $second sorted in ascendent order
     * @return int
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
