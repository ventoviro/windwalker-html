<?php
/**
 * Part of Windwalker project Test files.  @codingStandardsIgnoreStart
 *
 * @copyright  Copyright (C) 2019 SMS Taiwan, Inc.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Windwalker\Html\Test;

use Windwalker\Dom\Test\AbstractDomTestCase;
use Windwalker\Html\Enum\ListItem;
use Windwalker\Html\Enum\UList;

/**
 * Test class of UList
 *
 * @since 2.1
 */
class UListTest extends AbstractDomTestCase
{
    /**
     * Test instance.
     *
     * @var UList
     */
    protected $instance;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     */
    protected function setUp(): void
    {
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     *
     * @return void
     */
    protected function tearDown(): void
    {
    }

    /**
     * testCreateList
     *
     * @return  void
     */
    public function testCreateList()
    {
        $list = new UList();

        $this->assertEquals('<ul></ul>', (string) $list);

        $list = new UList(null, ['id' => 'list', 'class' => 'nav']);

        $this->assertEquals('<ul id="list" class="nav"></ul>', (string) $list);

        $items = [
            new ListItem('Remember, with great power, comes great responsibility'),
            new ListItem('Life was like a box of chocolates.'),
            new ListItem('You mustn’t be afraid to dream a little bigger,darling.', ['class' => 'nav-item']),
        ];

        $list = new UList($items);

        $html = <<<HTML
<ul>
    <li>Remember, with great power, comes great responsibility</li>
    <li>Life was like a box of chocolates.</li>
    <li class="nav-item">You mustn’t be afraid to dream a little bigger,darling.</li>
</ul>
HTML;

        $this->assertHtmlFormatEquals($html, (string) $list);
    }

    /**
     * Method to test addItem().
     *
     * @return void
     *
     * @covers \Windwalker\Html\Enum\AbstractHtmlList::addItem
     */
    public function testAddItem()
    {
        $list = new UList();

        $list->addItem(new ListItem('123'))
            ->addItem('ABC');

        $html = <<<HTML
<ul>
    <li>123</li>
    <li>ABC</li>
</ul>
HTML;

        $this->assertHtmlFormatEquals($html, $list);
    }

    /**
     * testSetItems
     *
     * @return  void
     */
    public function testSetItems()
    {
        $items = [
            new ListItem('Remember, with great power, comes great responsibility'),
            new ListItem('Life was like a box of chocolates.'),
            new ListItem('You mustn’t be afraid to dream a little bigger,darling.', ['class' => 'nav-item']),
        ];

        $list = new UList();
        $list->setItems($items);

        $html = <<<HTML
<ul>
    <li>Remember, with great power, comes great responsibility</li>
    <li>Life was like a box of chocolates.</li>
    <li class="nav-item">You mustn’t be afraid to dream a little bigger,darling.</li>
</ul>
HTML;

        $this->assertHtmlFormatEquals($html, (string) $list);
    }
}
