<?php declare(strict_types=1);
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2019 LYRASOFT.
 * @license    GNU General Public License version 2 or later;
 */

namespace Windwalker\Html\Form;

use Windwalker\Dom\HtmlElement;

/**
 * The InputElement class.
 *
 * @since  2.1
 */
class InputElement extends HtmlElement
{
    /**
     * Constructor
     *
     * @param string $type
     * @param string $name
     * @param string $value
     * @param array  $attribs
     */
    public function __construct($type, $name, $value = '', $attribs = [])
    {
        $attribs['type'] = $type;
        $attribs['name'] = $name;
        $attribs['value'] = $value;

        parent::__construct('input', null, $attribs);
    }
}
