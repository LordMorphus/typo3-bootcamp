<?php
declare(strict_types=1);

use MCEikens\Guestbook\Controller\GuestbookController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

ExtensionUtility::configurePlugin(
    'guestbook',
    'GuestBook',
    [
        GuestbookController::class => 'list',
    ],
    [
    ]
);