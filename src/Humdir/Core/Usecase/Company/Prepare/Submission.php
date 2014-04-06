<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Humdir\Core\Usecase\Company\Prepare;
use Humdir\Core\Data;
use Humdir\Core\Tool;
use Humdir\Core\Exception;

class Submission extends Data\Company
{
    public $name;
    public $email;
    private $validator;

    public function __construct(Data\Company $company, Tool\Validator $validator)
    {
        $this->name = $company->name;
        $this->email = $company->email;
        $this->validator = $validator;
    }

    public function validate()
    {
        $this->validator->setup(array(
            'name' => $this->name,
            'email' => $this->email
        ));
        $this->validator->add_required_rule('name');
        $this->validator->add_email_rule('email');
        $this->validator->add_email_domain_rule('email');

        if ( ! $this->validator->is_valid())
            throw new Exception\Validation($this->validator->get_error_keys());
    }
}
