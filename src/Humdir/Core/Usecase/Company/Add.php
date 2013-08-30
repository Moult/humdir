<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Humdir\Core\Usecase\Company;
use Humdir\Core\Usecase\Company\Add\Interactor;
use Humdir\Core\Usecase\Company\Add\Submission;

class Add
{
    private $data;
    private $repositories;
    private $tools;

    public function __construct(array $data, array $repositories, array $tools)
    {
        $this->data = $data;
        $this->repositories = $repositories;
        $this->tools = $tools;
    }

    public function fetch()
    {
        return new Interactor(
            $this->get_submission()
        );
    }

    private function get_submission()
    {
        return new Submission(
            $this->data['company'],
            $this->repositories['company_add'],
            $this->tools['validator']
        );
    }
}
