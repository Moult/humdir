<?php

namespace spec\Humdir\Core\Usecase\Customer\Prepare;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SubmissionSpec extends ObjectBehavior
{
    /**
     * @param Humdir\Core\Data\Customer $customer
     * @param Humdir\Core\Usecase\Customer\Prepare\Repository $repository
     * @param Humdir\Core\Tool\Validator $validator
     */
    function let($customer, $repository, $validator)
    {
        $customer->name = 'name';
        $customer->company = 'company';
        $this->beConstructedWith($customer, $repository, $validator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Humdir\Core\Usecase\Customer\Prepare\Submission');
    }

    function it_is_a_customer()
    {
        $this->shouldHaveType('Humdir\Core\Data\Customer');
    }

    function it_validates_the_submission($validator)
    {
        $validator->setup(array(
            'name' => 'name',
            'company' => 'company'
        ))->shouldBeCalled();
        $validator->rule('name', 'not_empty')->shouldBeCalled();
        $validator->callback('company', array($this, 'is_an_existing_company_id'), array('company'))->shouldBeCalled();
        $validator->check()->shouldBeCalled()->willReturn(FALSE);
        $validator->errors()->shouldBeCalled()->willReturn(array());
        $this->shouldThrow('Humdir\Core\Exception\Validation')->duringValidate();
    }

    function it_can_check_whether_or_not_there_is_an_existing_company_id($repository)
    {
        $repository->does_company_exist('id')->shouldBeCalled()->willReturn(FALSE);
        $this->is_an_existing_company_id('id')->shouldReturn(FALSE);
    }
}
