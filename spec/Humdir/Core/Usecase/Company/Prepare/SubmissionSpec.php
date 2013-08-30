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
        $company->website = 'website';
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
            'website' => 'website',
            'email' => 'email',
        ))->shouldBeCalled();
        $validator->rule('name', 'not_empty')->shouldBeCalled();
        $validator->rule('website', 'url')->shouldBeCalled();
        $validator->rule('email', 'email')->shouldBeCalled();
        $validator->rule('email', 'email_domain')->shouldBeCalled();
        $validator->check()->shouldBeCalled()->willReturn(FALSE);
        $validator->errors()->shouldBeCalled()->willReturn(array());
        $this->shouldThrow('Humdir\Core\Exception\Validation')->duringValidate();
    }
}
