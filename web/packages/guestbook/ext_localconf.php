<?php
declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use MCEikens\Guestbook\Controller\GuestController;

defined('TYPO3') or die();

ExtensionUtility::configurePlugin(
    'guestbook',
    'GuestBook',
    [
        GuestController::class => 'list',
    ],
);