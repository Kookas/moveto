<?php

/**
 * This file is part of kookas/movetobundle.
 *
 * (c) Ashleigh Udoh <mail@audoh.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kookas\MoveToBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Kookas\MoveToBundle\DependencyInjection\KookasMoveToExtension;

/**
 * KookasMoveToBundle
 *
 * @package    kookas/moveto
 * @author     Ashleigh Udoh <mail@audoh.co.uk>
 * @copyright  2017 Ashleigh Udoh
 * @license    http://www.opensource.org/licenses/MIT The MIT License
 */
class KookasMoveToBundle extends Bundle
{
	public function getContainerExtension()
    {
        return new KookasMoveToExtension();
    }
}
