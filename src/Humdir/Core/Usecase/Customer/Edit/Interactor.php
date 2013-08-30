<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Humdir\Core\Usecase\Customer\Edit;
use Humdir\Core\Usecase;

class Interactor
{
    public function __construct(Submission $submission, Usecase\Customer\Prepare $customer_prepare)
    {
        $this->submission = $submission;
        $this->customer_prepare = $customer_prepare;
    }

    public function interact()
    {
        $this->customer_prepare->fetch()->interact();
        $this->submission->update();
    }
}
