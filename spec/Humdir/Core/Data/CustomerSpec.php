<?php

namespace spec\Humdir\Core\Data;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CustomerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Humdir\Core\Data\Customer');
    }

    function it_has_a_name()
    {
        $this->name->shouldBe(NULL);
    }

    function it_has_a_company()
    {
        $this->company->shouldBe(NULL);
    }

    function it_has_a_referral()
    {
        $this->referral->shouldBe(NULL);
    }

    function it_has_a_last_contacted_date()
    {
        $this->last_contacted->shouldBe(NULL);
    }
}
