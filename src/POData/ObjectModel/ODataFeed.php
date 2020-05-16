<?php

declare(strict_types=1);

namespace POData\ObjectModel;

/**
 * Class ODataFeed.
 */
class ODataFeed extends ODataContainerBase
{
    /**
     * Row count, in case of $inlinecount option.
     *
     * @var int
     */
    public $rowCount = null;
    /**
     * Enter URL to next page, if pagination is enabled.
     *
     * @var ODataLink
     */
    public $nextPageLink = null;
    /**
     * Collection of entries under this feed.
     *
     * @var ODataEntry[]
     */
    public $entries = [];

    /**
     * ODataFeed constructor.
     * @param string       $id
     * @param ODataTitle   $title
     * @param ODataLink    $selfLink
     * @param int          $rowCount
     * @param ODataLink    $nextPageLink
     * @param ODataEntry[] $entries
     * @param string       $updated
     * @param string       $baseURI
     */
    public function __construct(string $id = null, ODataTitle $title = null, ODataLink $selfLink = null, int $rowCount = null, ODataLink $nextPageLink = null, array $entries = [], string $updated = null, string $baseURI = null)
    {
        parent::__construct($id, $title, $updated, $baseURI);
        $this->selfLink     = $selfLink;
        $this->rowCount     = $rowCount;
        $this->nextPageLink = $nextPageLink;
        $this->entries      = $entries;
    }

    /**
     * @return ODataLink
     */
    public function getNextPageLink(): ?ODataLink
    {
        return $this->nextPageLink;
    }

    /**
     * @param ODataLink $nextPageLink
     * @return ODataFeed
     */
    public function setNextPageLink(ODataLink $nextPageLink): self
    {
        $this->nextPageLink = $nextPageLink->isEmpty() ? null : $nextPageLink;
        return $this;
    }

    /**
     * @return ODataEntry[]
     */
    public function getEntries(): array
    {
        return $this->entries;
    }

    /**
     * @param ODataEntry[] $entries
     * @return ODataFeed
     */
    public function setEntries(array $entries): self
    {
        $this->entries = $entries;
        return $this;
    }
}
