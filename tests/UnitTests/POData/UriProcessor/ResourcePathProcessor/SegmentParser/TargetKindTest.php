<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 11/05/20
 * Time: 12:44 PM
 */

namespace UnitTests\POData\UriProcessor\ResourcePathProcessor\SegmentParser;

use POData\UriProcessor\ResourcePathProcessor\SegmentParser\TargetKind;
use UnitTests\POData\TestCase;

class TargetKindTest extends TestCase
{
    public function terminalProvider(): array
    {
        $result = [];
        $result[] = [TargetKind::NOTHING(), false];
        $result[] = [TargetKind::SERVICE_DIRECTORY(), false];
        $result[] = [TargetKind::RESOURCE(), false];
        $result[] = [TargetKind::COMPLEX_OBJECT(), false];
        $result[] = [TargetKind::PRIMITIVE(), false];
        $result[] = [TargetKind::PRIMITIVE_VALUE(), true];
        $result[] = [TargetKind::METADATA(), true];
        $result[] = [TargetKind::VOID_SERVICE_OPERATION(), false];
        $result[] = [TargetKind::BATCH(), true];
        $result[] = [TargetKind::LINK(), false];
        $result[] = [TargetKind::MEDIA_RESOURCE(), true];
        $result[] = [TargetKind::BAG(), true];
        $result[] = [TargetKind::SINGLETON(), false];

        return $result;
    }

    /**
     * @dataProvider terminalProvider
     *
     * @param TargetKind $targ
     * @param bool $expected
     */
    public function testIsTerminal(TargetKind $targ, bool $expected)
    {
        $actual = $targ->isTerminal();
        $this->assertEquals($expected, $actual);
    }
}
