<?php

declare(strict_types=1);

namespace UnitTests\POData\ObjectModel\Serialisers;

use POData\ObjectModel\CynicSerialiser;
use POData\UriProcessor\QueryProcessor\ExpandProjectionParser\ProjectionNode;

class CynicSerialiserDummy extends CynicSerialiser
{
    public function getCurrentExpandedProjectionNode(): ?ProjectionNode
    {
        return parent::getCurrentExpandedProjectionNode();
    }

    public function shouldExpandSegment(string $navigationPropertyName): bool
    {
        return parent::shouldExpandSegment($navigationPropertyName);
    }

    public function getProjectionNodes(): ?array
    {
        return parent::getProjectionNodes();
    }

    public function needNextPageLink(int $resultSetCount): bool
    {
        return parent::needNextPageLink($resultSetCount);
    }

    public function getNextLinkUri($lastObject): string
    {
        return parent::getNextLinkUri($lastObject);
    }
}
