<?php

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use App\MatrixUtils;


final class MatrixUtilsTest extends TestCase
{
    /**
     * @dataProvider dataProviderFor_test_numInrowSubarraysSumTarget
     */
    function test_numInrowSubarraysSumTarget($matrix, $target, $expected)
    {
        $result = MatrixUtils::numInrowSubarraysSumTarget($matrix, $target);

        $this->assertEquals($expected, $result);
    }

    public function dataProviderFor_test_numInrowSubarraysSumTarget()
    {
        return [
            [
                [
                    [0,1,2],
                    [0,1,2]
                ],
                0,
                2
            ],
        ];
    }

    /**
     * @dataProvider dataProviderFor_test_sumTwoMatrix
     */
    function test_sumTwoMatrix($matrix, $matrixToAdd, $expected)
    {
        $result = MatrixUtils::sumTwoMatrix($matrix, $matrixToAdd);

        $this->assertEquals($expected, $result);
    }

    function dataProviderFor_test_sumTwoMatrix()
    {
        return [
            [
                [
                    [0,0,0],
                    [0,0,0]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ]
            ],
            [
                [
                    [1,1,1],
                    [1,1,1]
                ],
                [
                    [1,2,3],
                    [4,5,6]
                ],
                [
                    [2,3,4],
                    [5,6,7]
                ]
            ]
        ];
    }
}
