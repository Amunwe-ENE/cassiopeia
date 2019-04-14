<?php
/**
 * @package     Joomla.UnitTest
 * @subpackage  Feed
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Tests\Unit\Libraries\Cms\Feed;

use InvalidArgumentException;
use Joomla\CMS\Feed\FeedLink;
use Joomla\Tests\Unit\UnitTestCase;

/**
 * Test class for FeedLink.
 *
 * @package     Joomla.UnitTest
 * @subpackage  Feed
 * @since       3.1.4
 */
class FeedLinkTest extends UnitTestCase
{
	/**
	 * Tests the FeedLink::__construct() method with invalid length.
	 *
	 * @return  void
	 *
	 * @expectedException  InvalidArgumentException
	 * @since              3.1.4
	 */
	public function testConstructWithInvalidLength()
	{
		new FeedLink('URI', 'self', 'application/x-pdf', 'en-GB', 'My Link', 'foobar');
	}
}