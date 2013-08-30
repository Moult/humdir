<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Humdir\Core\Usecase\Customer;
use Humdir\Core\Usecase\Customer\Prepare\Interactor;
use Humdir\Core\Usecase\Customer\Prepare\Submission;

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

    private function get_submission()
    {
        return new Submission(
            $this->data['customer'],
            $this->tools['validator']
        );
    }
}
