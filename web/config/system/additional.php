<?php

$GLOBALS['TYPO3_CONF_VARS']['DB']['Connection']['dbname'] = getenv('DATABASE_NAME');
$GLOBALS['TYPO3_CONF_VARS']['DB']['Connection']['host'] = getenv('DATABASE_HOST');
$GLOBALS['TYPO3_CONF_VARS']['DB']['Connection']['password'] = getenv('DATABASE_PASSWORD');
$GLOBALS['TYPO3_CONF_VARS']['DB']['Connection']['user'] = getenv('DATABASE_USER');