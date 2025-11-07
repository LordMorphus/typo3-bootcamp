<?php
declare(strict_types=1);

use MCEikens\Guestbook\Controller\GuestbookController;
use MCEikens\Guestbook\Controller\GuestController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

ExtensionUtility::configurePlugin(
    'guestbook',
    'GuestBook',
    [
        GuestbookController::class => 'list, show, create, update, delete',
        GuestController::class => 'list, show, create, update, delete',
    ],
    [
        GuestbookController::class => 'create, update, delete',
        GuestController::class => 'create, update, delete',
    ]
);