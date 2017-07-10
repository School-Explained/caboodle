<?php

namespace SchoolExplained;

use PHPUnit\Framework\TestCase;
use SchoolExplained\Caboodle;

class CaboodleTest extends TestCase
{
    public function testToArray()
    {
        $array = [1, 2, 3, 4, 5];
        $collection = Caboodle::make($array);
        $this->assertEquals($collection->toArray(), $array);
    }

    public function testMap()
    {
        $fruits = [
           ['name' => 'apple', 'colour' => 'green'],
           ['name' => 'banana', 'colour' => 'yellow'],
           ['name' => 'orange', 'colour' => 'orange']
        ];

        $names = Caboodle::make($fruits)->map('name')->toArray();
        $expected_names = ['apple', 'banana', 'orange'];
        $this->assertEquals($names, $expected_names);
        
        $colours = Caboodle::make($fruits)->map('colour')->toArray();
        $expected_colours = ['green', 'yellow', 'orange'];
        $this->assertEquals($colours, $expected_colours);
    }

    public function testJoin()
    {
        $array = [1, 2, 3, 4, 5];
        $collection = Caboodle::make($array);
        $expected_string = '1,2,3,4,5';
        $this->assertEquals($collection->join(','), $expected_string);
    }

    public function testCollapse()
    {
        $student = [
            'info' => [
                'id' => 1,
                'name' => 'Bob'
            ],
            'address' => [
                'city' => 'London',
                'postCode' => '0XX 1SS'
            ]
        ];
        $collection = Caboodle::make($student);
        $expected_array = [
            'id' => 1,
            'name' => 'Bob',
            'city' => 'London',
            'postCode' => '0XX 1SS'
        ];
        $this->assertEquals($collection->collapse()->toArray(), $expected_array);
    }
}
