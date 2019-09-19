<?php

$GLOBALS['TL_DCA']['tl_news']['fields']['september_atom_entry_id'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_news_archive']['september_atom_entry_id'],
    'exclude' => true,
    'eval' => [
        'unique' => true,
    ],
    'inputType' => 'text',
    'sql' => "varchar(255) NULL"
];