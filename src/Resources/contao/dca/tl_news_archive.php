<?php

$GLOBALS['TL_DCA']['tl_news_archive']['palettes']['__selector__'][] = 'septemberUseAtom';

$GLOBALS['TL_DCA']['tl_news_archive']['palettes']['default'] = str_replace('jumpTo;',
    'jumpTo;{september_atom_legend},septemberUseAtom;',
    $GLOBALS['TL_DCA']['tl_news_archive']['palettes']['default']);
$GLOBALS['TL_DCA']['tl_news_archive']['subpalettes']['septemberUseAtom'] = 'september_atom_url,september_atom_update_interval';

$GLOBALS['TL_DCA']['tl_news_archive']['fields']['septemberUseAtom'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_news_archive']['september_atom'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['submitOnChange' => true, 'tl_class' => 'w50'],
    'sql' => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_news_archive']['fields']['september_atom_url'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_news_archive']['september_atom_url'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['rgxp' => 'url', 'mandatory' => true, 'tl_class' => 'w50 clr'],
    'sql' => "varchar(255) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_news_archive']['fields']['september_atom_update_interval'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_news_archive']['september_atom_update_interval'],
    'exclude' => true,
    'inputType' => 'select',
    'options' => [
        'monthly' => &$GLOBALS['TL_LANG']['tl_news_archive']['september_atom_monthly'],
        'daily' => &$GLOBALS['TL_LANG']['tl_news_archive']['september_atom_daily'],
        'hourly' => &$GLOBALS['TL_LANG']['tl_news_archive']['september_atom_hourly'],
    ],
    'eval' => ['mandatory' => true, 'tl_class' => 'w50'],
    'sql' => "varchar(20) NOT NULL default ''"
];
