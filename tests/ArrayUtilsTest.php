<?php

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use App\ArrayUtils;


final class ArrayUtilsTest extends TestCase
{
    /**
     * @dataProvider dataProviderFor_test_numSubarraysSumTarget
     */
    public function test_numSubarraysSumTarget($array, $target, $expected)
    {
        $result = ArrayUtils::numSubarraysSumTarget($array, $target);

        $this->assertEquals($expected, $result);
    }

    public function dataProviderFor_test_numSubarraysSumTarget()
    {
        return [
            [
                [1,2,3],
                1,
                1
            ],
            [
                [1,1,1],
                1,
                3
            ],
            [
                [0,1,0,1,0],
                0,
                3
            ],
            [
                [0,1,2],
                0,
                1
            ]
        ];
    }

    /**
     * @dataProvider dataProviderFor_test_buildLeftSubarraysSumsHashTable
     */
    public function test_buildLeftSubarraysSumsHashTable($array, $expected)
    {
        $result = ArrayUtils::buildLeftSubarraysSumsHashTable($array);

        $this->assertEquals($expected, $result);
    }

    public function dataProviderFor_test_buildLeftSubarraysSumsHashTable()
    {
        return [
            [
                [0,0,0],
                [
                    0 => [0,1,2]
                ]
            ],
            [
                [1,2,3,4],
                [
                    1 => [0],
                    3 => [1],
                    6 => [2],
                    10 => [3]
                ]
            ],
            [
                [1, -1, 1, -1, 1, -1],
                [
                    1 => [0,2,4],
                    0 => [1,3,5]
                ]
            ]
        ];
    }

    /**
     * @dataProvider dataProviderFor_test_numCouplesWhereFirstIsSmaller
     */
    public function test_numCouplesWhereFirstIsSmaller($first, $second, $expected)
    {
        $result = ArrayUtils::numCouplesWhereFirstIsSmaller($first, $second);
        $this->assertEquals($expected, $result);
    }

    public function dataProviderFor_test_numCouplesWhereFirstIsSmaller()
    {
        return [
            [
                [0,0,0],
                [1,2,3,4],
                12
            ],
            [
                [0,0,0],
                [0,1,2],
                6
            ],
            [
                [1,2,3],
                [0,0],
                0
            ],
            [
                [1,3,5,7],
                [2,4,6,8],
                10
            ]
        ];
    }
}
