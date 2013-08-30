<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Humdir\Core\Usecase\Company\Add;
use Humdir\Core\Usecase;

class Interactor
{
    private $submission;
    private $company_prepare;

    public function __construct(Submission $submission, Usecase\Company\Prepare $company_prepare)
    {
        $this->submission = $submission;
        $this->company_prepare = $company_prepare;
    }

    public function interact()
    {
        $this->company_prepare->fetch()->interact();
        $this->submission->submit();
    }
}
