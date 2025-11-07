<?php

namespace MCEikens\Guestbook\Controller;

use MCEikens\Guestbook\Domain\Model\Comment;
use MCEikens\Guestbook\Domain\Repository\CommentRepository;
use MCEikens\Guestbook\Domain\Repository\GuestRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\PersistenceManagerInterface;

class GuestbookController extends ActionController
{
    public function __construct(
        private readonly CommentRepository $commentRepository,
        private readonly GuestRepository $guestRepository,
        private readonly PersistenceManagerInterface $persistenceManager
    )
    {
    }

    public function listAction(): ResponseInterface
    {
        $queryBuild = $this->commentRepository->createQuery();
        $querySettings = $queryBuild->getQuerySettings();
        $querySettings->setRespectStoragePage(false);
        $this->commentRepository->setDefaultQuerySettings($querySettings);

        $comments = $this->commentRepository->findAll();

        $this->view->assign('comments', $comments);

        return $this->htmlResponse();
    }

    public function showAction(Comment $comment): ResponseInterface
    {
        $this->view->assign('comment', $comment);
        return $this->htmlResponse();
    }

    public function createAction(?Comment $comment = null): ResponseInterface
    {
        if ($comment instanceof Comment) {
            $this->commentRepository->add($comment);
            $this->persistenceManager->persistAll();

            return $this->redirect('show', arguments: ['comment' => $comment] );
        }

        $queryBuild = $this->guestRepository->createQuery();
        $querySettings = $queryBuild->getQuerySettings();
        $querySettings->setRespectStoragePage(false);
        $this->guestRepository->setDefaultQuerySettings($querySettings);

        $guests = $this->guestRepository->findAll();
        $this->view->assign('guests', $guests);
        return $this->htmlResponse();
    }

    public function updateAction(Comment $comment): ResponseInterface
    {

        if ($this->request->getMethod() === 'POST') {
            $this->commentRepository->update($comment);
            $this->persistenceManager->persistAll();

            return $this->redirect('show', arguments: ['comment' => $comment] );
        }

        $queryBuild = $this->guestRepository->createQuery();
        $querySettings = $queryBuild->getQuerySettings();
        $querySettings->setRespectStoragePage(false);
        $this->guestRepository->setDefaultQuerySettings($querySettings);

        $guests = $this->guestRepository->findAll();
        $this->view->assign('guests', $guests);

        $this->view->assign('comment', $comment);
        return $this->htmlResponse();
    }

    public function deleteAction(Comment $comment): ResponseInterface
    {
        $this->commentRepository->remove($comment);
        $this->persistenceManager->persistAll();
        $this->addFlashMessage('Comment successfully deleted');
        return $this->redirect('list');
    }
}