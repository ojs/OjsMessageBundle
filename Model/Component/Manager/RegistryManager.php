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

namespace Okulbilisim\MessageBundle\Model\Component\Manager;

use Symfony\Component\Security\Core\User\UserInterface;

use Okulbilisim\MessageBundle\Model\Component\Manager\ManagerInterface;
use Okulbilisim\MessageBundle\Model\Component\Manager\BaseManager;
use Okulbilisim\MessageBundle\Entity\Registry;

/**
 *
 * @category Okulbilisim
 * @package  MessageBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 2.0
 * 
 *
 */
class RegistryManager extends BaseManager implements ManagerInterface
{
    /**
     *
     * @access public
     * @return \Okulbilisim\MessageBundle\Entity\Registry
     */
    public function createRegistry()
    {
        return $this->gateway->createRegistry();
    }

    public function updateRegistry(Registry $registry)
    {
        $this->gateway->updateRegistry($registry);

        return $registry;
    }

    /**
     *
     * @access public
     * @param  \Symfony\Component\Security\Core\User\UserInterface              $user
     * @return \Okulbilisim\MessageBundle\Model\Component\Manager\FolderManager
     */
    public function setupDefaults(UserInterface $user)
    {
        if (! is_object($user) || ! $user instanceof UserInterface) {
            throw new \Exception('User cannot be null and must implement UserInterface!');
        }

        $registry = $this->createRegistry();
        $registry->setOwnedByUser($user);
        $registry->setCachedUnreadMessageCount(0);

        $this->gateway->saveRegistry($registry);
        $this->refresh($registry);

        return $registry;
    }
}
