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

namespace Okulbilisim\MessageBundle\Controller;

use Okulbilisim\MessageBundle\Controller\BaseController;
use Okulbilisim\MessageBundle\Entity\Envelope;

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
class UserMessageBaseController extends BaseController
{
    /**
     *
     * @access protected
     * @param  int                                                        $userId
     * @return \Okulbilisim\MessageBundle\Form\Handler\MessageFormHandler
     */
    protected function getFormHandlerToSendMessage($userId = null)
    {
        $formHandler = $this->container->get('okulbilisim_message.form.handler.message');
        $formHandler->setRequest($this->getRequest());

        $formHandler->setSender($this->getUser());

        // Are we sending this to someone who's 'send message' button we clicked?
        if (null != $userId) {
            $sendToUser = $this->getUserModel()->findOneUserById($userId);

            $formHandler->setRecipient($sendToUser);
        }

        return $formHandler;
    }

    /**
     *
     * @access protected
     * @param \Okulbilisim\MessageBundle\Entity\Envelope
     * @param  int                                                             $userId
     * @return \Okulbilisim\MessageBundle\Form\Handler\MessageReplyFormHandler
     */
    protected function getFormHandlerToReplyToMessage(Envelope $inResponseEnvelope, $userId = null)
    {
        $formHandler = $this->container->get('okulbilisim_message.form.handler.message_reply');
        $formHandler->setRequest($this->getRequest());

        $formHandler->setSender($this->getUser());

        // Are we sending this to someone who's 'send message' button we clicked?
        if (null != $userId) {
            $sendToUser = $this->getUserModel()->findOneUserById($userId);

            $formHandler->setRecipient($sendToUser);
        }

        $formHandler->setInResponseToMessage($inResponseEnvelope->getMessage());

        return $formHandler;
    }

    /**
     *
     * @access protected
     * @param \Okulbilisim\MessageBundle\Entity\Envelope
     * @param  int                                                               $userId
     * @return \Okulbilisim\MessageBundle\Form\Handler\MessageForwardFormHandler
     */
    protected function getFormHandlerToForwardMessage(Envelope $envelopeToForward, $userId = null)
    {
        $formHandler = $this->container->get('okulbilisim_message.form.handler.message_forward');
        $formHandler->setRequest($this->getRequest());

        $formHandler->setSender($this->getUser());

        // Are we sending this to someone who's 'send message' button we clicked?
        if (null != $userId) {
            $sendToUser = $this->getUserModel()->findOneUserById($userId);

            $formHandler->setRecipient($sendToUser);
        }

        $formHandler->setMessageToForward($envelopeToForward->getMessage());

        return $formHandler;
    }
}
