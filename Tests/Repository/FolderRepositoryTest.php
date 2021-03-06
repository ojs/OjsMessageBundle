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

class FolderRepositoryTest extends TestBase
{
    public function testFindAllFoldersForUserById()
	{
		$this->purge();
		$users = $this->addFixturesForUsers();
		$this->addFixturesForFolders($users);
		$foldersFound = $this->getFolderModel()->findAllFoldersForUserById($users['harry']->getId());
		
		$this->assertCount(5, $foldersFound);
	}
}