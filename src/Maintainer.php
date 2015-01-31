<?php

namespace EDounar\PhpSpec\JsonMatcher;

use PhpSpec\Loader\Node\ExampleNode;
use PhpSpec\Runner\Maintainer\MaintainerInterface;
use PhpSpec\SpecificationInterface;
use PhpSpec\Runner\MatcherManager;
use PhpSpec\Runner\CollaboratorManager;

class Maintainer implements MaintainerInterface
{
    private $jsonMatcher;

    public function __construct(JsonMatcher $jsonMatcher)
    {
        $this->jsonMatcher = $jsonMatcher;
    }

    public function supports(ExampleNode $example)
    {
        return true;
    }

    public function prepare(
        ExampleNode $example,
        SpecificationInterface $context,
        MatcherManager $matchers,
        CollaboratorManager $collaborators
    ) {
        $matchers->add($this->jsonMatcher);
    }

    public function teardown(ExampleNode $example, SpecificationInterface $context,
        MatcherManager $matchers, CollaboratorManager $collaborators)
    {
    }

    public function getPriority()
    {
        return 40;
    }
}
