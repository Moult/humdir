<?php

namespace spec\Humdir\Core\Usecase\Company\Prepare;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SubmissionSpec extends ObjectBehavior
{
    /**
     * @param Humdir\Core\Data\Company $company
     * @param Humdir\Core\Tool\Validator $validator
     */
    function let($company, $validator)
    {
        $company->name = 'name';
        $company->email = 'email';
        $this->beConstructedWith($company, $validator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Humdir\Core\Usecase\Company\Prepare\Submission');
    }

    function it_is_a_company()
    {
        $this->shouldHaveType('Humdir\Core\Data\Company');
    }

    function it_validates_the_submission($validator)
    {
        $validator->setup(array(
            'name' => 'name',
            'email' => 'email',
        ))->shouldBeCalled();
        $validator->add_required_rule('name')->shouldBeCalled();
        $validator->add_email_rule('email')->shouldBeCalled();
        $validator->add_email_domain_rule('email')->shouldBeCalled();
        $validator->is_valid()->shouldBeCalled()->willReturn(FALSE);
        $validator->get_error_keys()->shouldBeCalled()->willReturn(array());
        $this->shouldThrow('Humdir\Core\Exception\Validation')->duringValidate();
    }
}
