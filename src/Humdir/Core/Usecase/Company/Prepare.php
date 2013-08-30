<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Humdir\Core\Usecase\Company;
use Humdir\Core\Usecase\Company\Prepare\Interactor;
use Humdir\Core\Usecase\Company\Prepare\Submission;

class Prepare
{
    private $data;
    private $tools;

    public function __construct(array $data, array $tools)
    {
        $this->data = $data;
        $this->tools = $tools;
    }

    public function fetch()
    {
        return new Interactor(
            $this->get_submission()
        );
    }

    public function get_submission()
    {
        return new Submission(
            $this->data['company'],
            $this->tools['validator']
        );
    }
}
