<?php

/*
 * This file is part of the Okulbilisim MessageBundle
 *
 * (c) CodeConsortium <http://www.codeconsortium.com/>
 *
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Okulbilisim\MessageBundle\Tests\Repository;

use Okulbilisim\MessageBundle\Tests\TestBase;

class RegistryManagerTest extends TestBase
{
    public function testSetupDefaults()
    {
		$this->purge();
		$user = $this->addNewUser('bob', 'bob@foo.com', 'root');
		$folders = $this->addFixturesForFolders(array($user));
		$messages = $this->addFixturesForMessages(array($user));
		$this->addFixturesForEnvelopes($messages, $folders, array($user));
		$this->getRegistryModel()->setupDefaults($user);
		$registry = $this->getRegistryModel()->findOneRegistryForUserById($user->getId());
		
		$this->assertNotNull($registry);
    }
}
