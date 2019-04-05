<?php

namespace Daison\Tests;

use PHPUnit\Framework\TestCase;
use Daison\Collab\Collab;

class CollabTest extends TestCase
{
    public function testClosure()
    {
        Collab::make()->setArgs('Daison', 'Carino')->handle(function ($fname, $lname) {
            $this->assertEquals($fname, 'Daison');
            $this->assertEquals($lname, 'Carino');
        });
    }

    public function testInvokableClass()
    {
        Collab::make()->setArgs('Daison', 'Carino', $this)->handle(new InvokableClass());
    }

    public function testClassMethod()
    {
        Collab::make()->setArgs('Daison', 'Carino', $this)->handle(InvokableClass::class.'@sample');
    }

    public function testClassStaticMethod()
    {
        Collab::make()->setArgs('Daison', 'Carino', $this)->handle(InvokableClass::class.'::staticSample');
    }
}
