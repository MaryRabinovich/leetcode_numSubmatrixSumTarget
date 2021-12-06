<?php

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use App\Solution;


final class SolutionTest extends TestCase
{
    /**
     * @dataProvider dataProviderFor_test_numSubmatrixSumTarget
     */
    public function test_numSubmatrixSumTarget($matrix, $target, $expected)
    {
        $solution = new Solution();
        $result = $solution->numSubmatrixSumTarget($matrix, $target);

        $this->assertEquals($expected, $result);
    }

    public function dataProviderFor_test_numSubmatrixSumTarget()
    {
        return [
            [
                [
                    [0,1,2],
                    [0,1,2]
                ],
                0,
                3
            ],
            [
                [
                    [1,2,3],
                    [4,5,6]
                ],
                5,
                3
            ],
            [
                [
                    [1,1,1,1],
                    [1,1,1,1]
                ],
                4,
                5
            ]
        ];
    }
}
