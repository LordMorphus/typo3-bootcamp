<?php

namespace MCEikens\Guestbook\Controller;

use MCEikens\Guestbook\Domain\Model\Guest;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use MCEikens\Guestbook\Domain\Repository\GuestRepository;

class GuestController extends ActionController
{
    public function __construct(
        private readonly GuestRepository $guestRepository,
        private readonly ConfigurationManagerInterface $configurationManagerInterface
    ){
    }

    public function listAction(): ResponseInterface {

        $settings = $this->configurationManagerInterface
            ->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);

        // debug($settings['persistence']['storagePid']);

        // $guests = $this->guestRepository->findAll();

        $guests = $this->guestRepository->findBy(['pid' => $settings['persistence']['storagePid']]);

        $this->view->assign('guests', $guests);

        return $this->htmlResponse();
    }

    public function detailAction(Guest $guest): ResponseInterface {

        $this->view->assign('guest', $guest);

        return $this->htmlResponse();
    }

    public function createAction(?Guest $guest = null): ResponseInterface {

        if ($this->request->getMethod() === 'POST') {

        }

        $this->view->assign('guest', new Guest());

        return $this->htmlResponse();
    }
}