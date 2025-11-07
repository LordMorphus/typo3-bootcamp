<?php

namespace MCEikens\Guestbook\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class GuestbookController extends ActionController
{
    public function listAction(): ResponseInterface
    {
        var_dump($this->request);

        die();
    }

}