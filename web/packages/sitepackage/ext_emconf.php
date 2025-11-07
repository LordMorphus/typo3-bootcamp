<?php
$EM_CONF['sitepackage'] = [
    'title' => 'mceikens/sitepackage"',
    'description' => 'This is a sitepackage extension',
    'category' => 'plugin',
    'author' => 'Eike Drost',
    'author_email' => 'eike.drost@mceikens.de',
    'author_company' => 'MCEikens',
    'state' => 'experimental',
    'version' => '0.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-13.4.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];