<?php

namespace App\Models\Contact\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ContactNotFoundException extends NotFoundHttpException
{

    /**
     * ContactNotFoundException constructor.
     */
    public function __construct()
    {
        parent::__construct('Contact not found.');
    }
}
