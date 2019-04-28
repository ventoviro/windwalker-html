<?php declare(strict_types=1);
/**
 * Part of Windwalker project Test files.  @codingStandardsIgnoreStart
 *
 * @copyright  Copyright (C) 2019 SMS Taiwan, Inc.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Windwalker\Html\Test;

use Windwalker\Dom\Test\AbstractDomTestCase;
use Windwalker\Html\Enum\ListItem;
use Windwalker\Html\Enum\OList;

/**
 * Test class of OList
 *
 * @since 2.1
 */
class OListTest extends AbstractDomTestCase
{
    /**
     * Test instance.
     *
     * @var OList
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
        $list = new OList();

        $this->assertEquals('<ol></ol>', (string) $list);

        $list = new OList(null, ['id' => 'list', 'class' => 'nav']);

        $this->assertEquals('<ol id="list" class="nav"></ol>', (string) $list);

        $items = [
            new ListItem('Remember, with great power, comes great responsibility'),
            new ListItem('Life was like a box of chocolates.'),
            new ListItem('You mustn’t be afraid to dream a little bigger,darling.', ['class' => 'nav-item']),
        ];

        $list = new OList($items);

        $html = <<<HTML
<ol>
    <li>Remember, with great power, comes great responsibility</li>
    <li>Life was like a box of chocolates.</li>
    <li class="nav-item">You mustn’t be afraid to dream a little bigger,darling.</li>
</ol>
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
        $list = new OList();

        $list->addItem(new ListItem('123'))
            ->addItem('ABC');

        $html = <<<HTML
<ol>
    <li>123</li>
    <li>ABC</li>
</ol>
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

        $list = new OList();
        $list->setItems($items);

        $html = <<<HTML
<ol>
    <li>Remember, with great power, comes great responsibility</li>
    <li>Life was like a box of chocolates.</li>
    <li class="nav-item">You mustn’t be afraid to dream a little bigger,darling.</li>
</ol>
HTML;

        $this->assertHtmlFormatEquals($html, (string) $list);
    }
}
