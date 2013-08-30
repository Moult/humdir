<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Humdir\Core\Usecase\Company;
use Humdir\Core\Usecase\Company\Edit\Interactor;
use Humdir\Core\Usecase\Company\Edit\Submission;
use Humdir\Core\Usecase;

class Edit
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
            $this->get_submission(),
            $this->get_company_prepare()
        );
    }

    private function get_submission()
    {
        return new Submission(
            $this->data['company'],
            $this->repositories['company_edit']
        );
    }

    private function get_company_prepare()
    {
        return new Usecase\Company\Prepare(
            ['company' => $this->data['company']],
            ['validator' => $this->tools['validator']]
        );
    }
}
