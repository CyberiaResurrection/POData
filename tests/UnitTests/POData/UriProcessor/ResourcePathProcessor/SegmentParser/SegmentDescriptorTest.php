<?php

namespace UnitTests\POData\UriProcessor\ResourcePathProcessor\SegmentParser;

use POData\UriProcessor\ResourcePathProcessor\SegmentParser\KeyDescriptor;
use POData\UriProcessor\ResourcePathProcessor\SegmentParser\SegmentDescriptor;
use UnitTests\POData\TestCase;
use Mockery as m;

/**
 * Class SegmentDescriptorTest
 * @package UnitTests\POData\UriProcessor\ResourcePathProcessor\SegmentParser
 */
class SegmentDescriptorTest extends TestCase
{
    public function testHasKeyValuesWhenNone()
    {
        $foo = new SegmentDescriptor();
        $this->assertFalse($foo->hasKeyValues());
    }

    public function testHasKeyValuesWhenSome()
    {
        $key = m::mock(KeyDescriptor::class);

        $foo = new SegmentDescriptor();
        $foo->setKeyDescriptor($key);
        $this->assertTrue($foo->hasKeyValues());
    }

    public function testIsOkNewCreation()
    {
        $foo = new SegmentDescriptor();
        $this->assertTrue($foo->isOK());
    }

    public function testIsNotOkForwardButNotReverse()
    {
        $next = m::mock(SegmentDescriptor::class)->makePartial();
        $foo = new SegmentDescriptor();
        $foo->setNext($next);
        $this->assertFalse($foo->isOK());
    }

    public function testIsNotOkReverseButNotForward()
    {
        $next = m::mock(SegmentDescriptor::class)->makePartial();
        $foo = new SegmentDescriptor();
        $foo->setPrevious($next);
        $this->assertFalse($foo->isOK());
    }

    public function testIsOkReverseAndForward()
    {
        $foo = new SegmentDescriptor();
        $prev = m::mock(SegmentDescriptor::class)->makePartial();
        $prev->shouldReceive('getNext')->andReturn($foo);
        $next = m::mock(SegmentDescriptor::class)->makePartial();
        $next->shouldReceive('getPrevious')->andReturn($foo);

        $foo->setNext($next);
        $foo->setPrevious($prev);
        $this->assertTrue($foo->isOK());
    }
}
