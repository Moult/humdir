<?php

namespace spec\Humdir\Core\Usecase\Company;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PrepareSpec extends ObjectBehavior
{
    /**
     * @param Humdir\Core\Data\Company $company
     * @param Humdir\Core\Tool\Validator $validator
     */
    function let($company, $validator)
    {
        $data = array(
            'company' => $company
        );

        $tools = array(
            'validator' => $validator
        );

        $this->beConstructedWith($data, $tools);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Humdir\Core\Usecase\Company\Prepare');
    }

    function it_fetches_the_interactor()
    {
        $this->fetch()->shouldHaveType('Humdir\Core\Usecase\Company\Prepare\Interactor');
    }
}
