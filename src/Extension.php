<?php

namespace EDounar\PhpSpec\JsonMatcher;

use PhpSpec\Extension\ExtensionInterface;
use PhpSpec\ServiceContainer;

class Extension implements ExtensionInterface
{
    public function load(ServiceContainer $container)
    {
        $container->set(
            'runner.maintainers.json_matcher_maintainer',
            function ($c) {
                $matcher = new JsonMatcher($c->get('formatter.presenter'));

                return new Maintainer($matcher);
            }
        );
    }
}
