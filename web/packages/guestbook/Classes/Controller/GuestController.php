<?php

namespace MCEikens\Guestbook\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class GuestController extends ActionController
{
    public function listAction(): ResponseInterface {
        return $this->htmlResponse();
    }
}