<?php

/*
 * @copyright  trilobit GmbH
 * @author     trilobit GmbH <https://github.com/trilobit-gmbh>
 * @license    LGPL-3.0-or-later
 * @link       http://github.com/trilobit-gmbh/contao-hyphenator-bundle
 */

$strTable = 'tl_content';

// Palettes
foreach (array_keys($GLOBALS['TL_DCA'][$strTable]['palettes']) as $key) {
    $GLOBALS['TL_DCA'][$strTable]['palettes'][$key] = str_replace(
        ';{template_legend',
        ';{hyphen_legend},addHyphen;{template_legend',
        $GLOBALS['TL_DCA'][$strTable]['palettes'][$key]
    );
}

// Fields
$GLOBALS['TL_DCA'][$strTable]['fields']['addHyphen'] = [
    'label' => &$GLOBALS['TL_LANG'][$strTable]['addHyphen'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'clr w50 cbx'],
    'sql' => "char(1) NOT NULL default ''",
];
