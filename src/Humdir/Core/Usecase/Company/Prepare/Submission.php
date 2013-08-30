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
    public $website;
    public $email;
    private $validator;

    public function __construct(Data\Company $company, Tool\Validator $validator)
    {
        $this->name = $company->name;
        $this->website = $company->website;
        $this->email = $company->email;
        $this->validator = $validator;
    }

    public function validate()
    {
        $this->validator->setup(array(
            'name' => $this->name,
            'website' => $this->website,
            'email' => $this->email
        ));
        $this->validator->rule('name', 'not_empty');
        $this->validator->rule('website', 'url');
        $this->validator->rule('email', 'email');
        $this->validator->rule('email', 'email_domain');

        if ( ! $this->validator->check())
            throw new Exception\Validation($this->validator->errors());
    }
}
