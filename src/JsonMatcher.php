<?php

namespace EDounar\PhpSpec\JsonMatcher;

use PhpSpec\Exception\Example\FailureException;
use PhpSpec\Exception\Example\NotEqualException;
use PhpSpec\Matcher\BasicMatcher;
use PhpSpec\Formatter\Presenter\PresenterInterface;

class JsonMatcher extends BasicMatcher
{
    private $presenter;

    public function __construct(PresenterInterface $presenter)
    {
        $this->presenter = $presenter;
    }

    public function supports($name, $subject, array $arguments)
    {
        return 1 == count($arguments) &&
            ($name === 'returnJson' || $name === 'beJson');
    }

    protected function matches($subject, array $arguments)
    {
        return json_encode(json_decode($subject)) ===
            json_encode(json_decode($arguments[0]));
    }

    protected function getFailureException($name, $subject, array $arguments)
    {
        $expected = json_encode(json_decode($arguments[0]), JSON_PRETTY_PRINT);
        $actual   = json_encode(json_decode($subject), JSON_PRETTY_PRINT);

        return new NotEqualException(
            "actual JSON differs from expected",
            $expected,
            $actual
        );
    }

    protected function getNegativeFailureException($name, $subject, array $arguments)
    {
        return new FailureException(sprintf(
            'Did not expect JSON to be equal to %s',
            $this->presenter->presentValue($subject)
        ));
    }
}
