<?php declare(strict_types=1);
/**
 * Part of Windwalker project Test files.  @codingStandardsIgnoreStart
 *
 * @copyright  Copyright (C) 2019 SMS Taiwan, Inc.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Windwalker\Html\Test;

use Windwalker\Dom\Test\AbstractDomTestCase;
use Windwalker\Html\Media\Video;

/**
 * Test class of Video
 *
 * @since 2.1
 */
class VideoTest extends AbstractDomTestCase
{
    /**
     * Test instance.
     *
     * @var Video
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
        $this->instance = new Video();
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
     * Method to test toString().
     *
     * @return void
     *
     * @covers \Windwalker\Html\Media\Video::toString
     */
    public function testToString()
    {
        $video = Video::create(['id' => 'foo'])
            ->addMp4Source('foo.mp4')
            ->addOggSource('foo.ogg')
            ->addWebMSource('foo.webm', 'screen and (min-width:320px)')
            ->autoplay(true)
            ->controls(true)
            ->loop(true)
            ->muted(true)
            ->poster('poster.png')
            ->preload(Video::PRELOAD_AUTO)
            ->height(1920)
            ->width(1080);

        $html = <<<HTML
<video id="foo" autoplay controls loop muted poster="poster.png" preload="auto" height="1920" width="1080">
    <source src="foo.mp4" type="video/mp4" />
    <source src="foo.ogg" type="video/ogg" />
    <source src="foo.webm" type="video/webm" media="screen and (min-width:320px)" />
</video>
HTML;

        $this->assertHtmlFormatEquals($html, $video);
    }
}
