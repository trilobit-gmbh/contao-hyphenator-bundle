<?php

/*
 * @copyright  trilobit GmbH
 * @author     trilobit GmbH <https://github.com/trilobit-gmbh>
 * @license    LGPL-3.0-or-later
 * @link       http://github.com/trilobit-gmbh/contao-hyphenator-bundle
 */

$GLOBALS['TL_HOOKS']['parseTemplate'][] = [\Trilobit\HyphenatorBundle\Template\Parser::class, 'addHyphens'];
