<?php

namespace spec\Humdir\Core\Usecase\Customer\Add;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SubmissionSpec extends ObjectBehavior
{
    /**
     * @param Humdir\Core\Data\Customer $customer
     * @param Humdir\Core\Usecase\Customer\Add\Repository $repository
     */
    function let($customer, $repository)
    {
        $customer->name = 'name';
        $customer->company = 'company';
        $customer->referral = 'referral';
        $customer->last_contacted = 'last_contacted';
        $this->beConstructedWith($customer, $repository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Humdir\Core\Usecase\Customer\Add\Submission');
    }

    function it_should_be_a_customer()
    {
        $this->shouldHaveType('Humdir\Core\Data\Customer');
    }

    function it_can_save_the_submission($repository)
    {
        $repository->save_customer('name', 'company', 'referral', 'last_contacted')->shouldBeCalled();
        $this->save();
    }
}
