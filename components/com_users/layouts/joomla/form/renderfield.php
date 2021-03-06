<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;

extract($displayData);

/**
 * Layout variables
 * -----------------
 * @var   array   $options  Optional parameters
 * @var   string  $label    The html code for the label (not required if $options['hiddenLabel'] is true)
 * @var   string  $input    The input field html code
 */

if (!empty($options['showonEnabled']))
{
	/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
	$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
	$wa->useScript('showon');
}

$class = empty($options['class']) ? '' : ' ' . $options['class'];
$rel   = empty($options['rel']) ? '' : ' ' . $options['rel'];

/**
 * @TODO:
 *
 * As mentioned in #8473 (https://github.com/joomla/joomla-cms/pull/8473), ...
 * as long as we cannot access the field properties properly, this seems to
 * be the way to go for now.
 *
 * On a side note: Parsing html is seldom a good idea.
 * https://stackoverflow.com/questions/1732348/regex-match-open-tags-except-xhtml-self-contained-tags/1732454#1732454
 */
preg_match('/class=\"([^\"]+)\"/i', $input, $match);

$required     = (strpos($input, 'aria-required="true"') !== false
			|| (!empty($match[1]) && (strpos($match[1], 'required') !== false) || strpos($displayData['class'], 'required') !== false));
$typeOfSpacer = (strpos($label, 'spacer-lbl') !== false);

?>

<div class="control-group<?php echo $class; ?>"<?php echo $rel; ?>>
	<?php if (empty($options['hiddenLabel'])): ?>
		<div class="control-label">
			<?php echo $label; ?>
		</div>
	<?php endif; ?>
	<div class="controls">
		<?php echo $input; ?>
	</div>
</div>
