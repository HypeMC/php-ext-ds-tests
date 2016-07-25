<?php
namespace Ds\Tests\Map;

trait ksort
{
    public function sortKeyDataProvider()
    {
        return [
            [[

            ]],
            [[
                'a' => 3,
                'c' => 1,
                'b' => 2,
            ]],
            [[
                3 => 'd',
                0 => 'a',
                1 => 'b',
                4 => 'e',
                2 => 'c',
            ]],
        ];
    }

    /**
     * @dataProvider sortKeyDataProvider
     */
    public function testKeySort(array $values)
    {
        $instance = $this->getInstance($values);

        $expected = $values;
        ksort($expected);

        $instance->ksort();
        $this->assertToArray($expected, $instance);
    }

    /**
     * @dataProvider sortKeyDataProvider
     */
    public function testSortedByKeyUsingComparator(array $values)
    {
        $instance = $this->getInstance($values);

        $instance->ksort(function($a, $b) {
            return $b <=> $a;
        });

        $expected = $values;
        krsort($expected);

        $this->assertToArray($expected, $instance);
    }
}
