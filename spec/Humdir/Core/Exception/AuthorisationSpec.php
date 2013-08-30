<?php

namespace spec\Humdir\Core\Exception;

use PhpSpec\ObjectBehavior;

class AuthorisationSpec extends ObjectBehavior
{
    function it_should_be_initializable()
    {
        $this->shouldHaveType('Humdir\Core\Exception\Authorisation');
    }

    function it_is_an_exception()
    {
        $this->shouldHaveType('Exception');
    }
}
