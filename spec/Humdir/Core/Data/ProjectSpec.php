<?php

namespace spec\Humdir\Core\Data;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProjectSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Humdir\Core\Data\Project');
    }

    function it_has_an_id()
    {
        $this->id->shouldBe(NULL);
    }

    function it_has_requirements()
    {
        $this->requirements->shouldBe(NULL);
    }

    function it_has_a_proposal()
    {
        $this->proposal->shouldBe(NULL);
    }

    function it_has_a_response()
    {
        $this->response->shouldBe(NULL);
    }

    function it_has_notes()
    {
        $this->notes->shouldBe(NULL);
    }

    function it_belongs_to_a_category()
    {
        $this->category->shouldBe(NULL);
    }
}
