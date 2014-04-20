<?php

namespace Knp\Menu\Matcher\Voter;

use Knp\Menu\ItemInterface;

/**
 * Implements the VoterInterface so can be used as voter for "current" class
 * `matchItem` will return true if the motif you're searching for is found in the URI of the item
 */
class RegexpVoter implements VoterInterface
{
    /**
     * @var null|string
     */
    private $regexp;

    /**
     * @param string|null $regexp
     */
    public function __construct($regexp = null)
    {
        $this->regexp = $regexp;
    }

    /**
     * @param string $regexp
     */
    public function setRegexp($regexp)
    {
        $this->regexp = $regexp;
    }

    public function matchItem(ItemInterface $item)
    {
        if (null === $this->regexp || null === $item->getUri()) {
            return null;
        }

        if (preg_match($this->regexp, $item->getUri())) {
            return true;
        }

        return null;
    }
} 