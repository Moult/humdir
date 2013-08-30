<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Humdir\Core\Usecase\Company\Edit;

interface Repository
{
    public function update_company($id, $name, $department, $website, $phone_number, $email, $contact_method);
}
