<?php

namespace spec\Humdir\Core\Data;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CompanySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Humdir\Core\Data\Company');
    }

    function it_has_an_id()
    {
        $this->id->shouldBe(NULL);
    }

    function it_has_a_name()
    {
        $this->name->shouldBe(NULL);
    }

    function it_has_a_department_name()
    {
        $this->department->shouldBe(NULL);
    }

    function it_has_a_website()
    {
        $this->website->shouldBe(NULL);
    }

    function it_has_a_phone_number()
    {
        $this->phone_number->shouldBe(NULL);
    }

    function it_has_an_email_address()
    {
        $this->email->shouldBe(NULL);
    }

    function it_has_an_address()
    {
        $this->address->shouldBe(NULL);
    }

    function it_has_a_contact_method()
    {
        $this->contact_method->shouldBe(NULL);
    }
}
