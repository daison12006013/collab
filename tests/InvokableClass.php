<?php

namespace Daison\Tests;

class InvokableClass
{
    public function __invoke($fname, $lname, $tester)
    {
        $tester->assertEquals($fname, 'Daison');
        $tester->assertEquals($lname, 'Carino');
    }

    public function sample($fname, $lname, $tester)
    {
        $tester->assertEquals($fname, 'Daison');
        $tester->assertEquals($lname, 'Carino');
    }

    public static function staticSample($fname, $lname, $tester)
    {
        $tester->assertEquals($fname, 'Daison');
        $tester->assertEquals($lname, 'Carino');
    }
}
