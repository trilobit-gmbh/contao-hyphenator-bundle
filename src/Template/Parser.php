<?php

declare(strict_types=1);

/*
 * @copyright  trilobit GmbH
 * @author     trilobit GmbH <https://github.com/trilobit-gmbh>
 * @license    LGPL-3.0-or-later
 * @link       http://github.com/trilobit-gmbh/contao-hyphenator-bundle
 */

namespace Trilobit\HyphenatorBundle\Template;

/**
 * Class HookParseTemplate.
 *
 * @author trilobit GmbH <https://github.com/trilobit-gmbh>
 */
class Parser
{
    /**
     * @param $that
     */
    public function addHyphens($that)
    {
        if (!empty($that->addHyphen)) {
            foreach (['headline', 'text', 'listitems', 'linkTitle', 'titleText', 'summary', 'tableitems', 'caption'] as $key) {
                if (!empty($that->{$key})) {
                    if ('listitems' === $key) {
                        $that->items = array_map(
                            function ($item) {
                                $item['content'] = $this->hyphenateContent($item['content']);

                                return $item;
                            },
                            $that->items
                        );
                    } else {
                        $that->{$key} = $this->hyphenateContent($that->{$key});
                    }
                }
            }
        }
    }

    /**
     * @param $content
     *
     * @return string
     */
    private function hyphenateContent($content)
    {
        $options = new \Org\Heigl\Hyphenator\Options();
        $options->setHyphen('[-]')
            ->setDefaultLocale('de_DE')
            ->setRightMin(2)
            ->setLeftMin(2)
            ->setWordMin(5)
            ->setFilters('Simple')
            ->setTokenizers(['Whitespace', 'Punctuation']);

        $hyphen = new \Org\Heigl\Hyphenator\Hyphenator();
        $hyphen->setOptions($options);

        return $hyphen->hyphenate($content);
    }
}
