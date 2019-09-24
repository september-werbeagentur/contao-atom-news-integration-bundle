<?php

$GLOBALS['TL_DCA']['tl_news_archive']['palettes']['__selector__'][] = 'septemberUseAtom';

$GLOBALS['TL_DCA']['tl_news_archive']['palettes']['default'] = str_replace('jumpTo;',
    'jumpTo;{september_atom_legend},septemberUseAtom;',
    $GLOBALS['TL_DCA']['tl_news_archive']['palettes']['default']);
$GLOBALS['TL_DCA']['tl_news_archive']['subpalettes']['septemberUseAtom'] = 'september_atom_url';

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
