<?php

namespace spec\Humdir\Core\Usecase\Company\Add;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SubmissionSpec extends ObjectBehavior
{
    /**
     * @param Humdir\Core\Data\Company $company
     * @param Humdir\Core\Usecase\Company\Add\Repository $repository
     */
    function let($company, $repository)
    {
        $company->name = 'name';
        $company->department = 'department';
        $company->website = 'website';
        $company->phone_number = 'phone_number';
        $company->email = 'email';
        $company->address = 'address';
        $company->contact_method = 'contact_method';
        $this->beConstructedWith($company, $repository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Humdir\Core\Usecase\Company\Add\Submission');
    }

    function it_is_a_company()
    {
        $this->shouldHaveType('Humdir\Core\Data\Company');
    }

    function it_submits_the_submission($repository)
    {
        $repository->add_company('name', 'department', 'website', 'phone_number', 'email', 'address', 'contact_method')->shouldBeCalled()->willReturn('id');
        $this->submit()->shouldReturn('id');
    }
}
