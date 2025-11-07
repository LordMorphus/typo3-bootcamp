<?php

namespace MCEikens\Guestbook\Controller;

use MCEikens\Guestbook\Domain\Model\Guest;
use MCEikens\Guestbook\Domain\Repository\GuestRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\PersistenceManagerInterface;

class GuestbookController extends ActionController
{
    public function __construct(
        private readonly GuestRepository $guestRepository,
        private readonly PersistenceManagerInterface $persistenceManager
    )
    {
    }

    public function listAction(): ResponseInterface
    {
        $queryBuild = $this->guestRepository->createQuery();
        $querySettings = $queryBuild->getQuerySettings();
        $querySettings->setRespectStoragePage(false);
        $this->guestRepository->setDefaultQuerySettings($querySettings);

        $guests = $this->guestRepository->findAll();

        $this->view->assign('guests', $guests);

        return $this->htmlResponse();
    }

    public function showAction(Guest $guest): ResponseInterface
    {
        $this->view->assign('guest', $guest);
        return $this->htmlResponse();
    }

    public function createAction(?Guest $guest = null): ResponseInterface
    {
        if ($guest instanceof Guest) {
            $this->guestRepository->add($guest);
            $this->persistenceManager->persistAll();

            return $this->redirect('show', arguments: ['guest' => $guest] );
        }

        return $this->htmlResponse();
    }

    public function updateAction(Guest $guest): ResponseInterface
    {

        if ($this->request->getMethod() === 'POST') {
            $this->guestRepository->update($guest);
            $this->persistenceManager->persistAll();

            return $this->redirect('show', arguments: ['guest' => $guest] );
        }

        $this->view->assign('guest', $guest);
        return $this->htmlResponse();
    }

    public function deleteAction(Guest $guest): ResponseInterface
    {
        $this->guestRepository->remove($guest);
        $this->persistenceManager->persistAll();
        $this->addFlashMessage('Guest successfully deleted');
        return $this->redirect('list');
    }
}