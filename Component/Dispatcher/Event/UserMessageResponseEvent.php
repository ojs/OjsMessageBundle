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

namespace Okulbilisim\MessageBundle\Component\Dispatcher\Event;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Okulbilisim\MessageBundle\Entity\Message;

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
class UserMessageResponseEvent extends UserMessageEvent
{
    /**
     *
     * @access protected
     * @var \Symfony\Component\HttpFoundation\Response $response
     */
    protected $response;

    /**
     *
     * @access public
     * @param \Symfony\Component\HttpFoundation\Request  $request
     * @param \Symfony\Component\HttpFoundation\Response $response
     * @param \Okulbilisim\MessageBundle\Entity\Message  $message
     */
    public function __construct(Request $request, Response $response, Message $message = null)
    {
        $this->request = $request;
        $this->response = $response;
        $this->message = $message;
    }

    /**
     *
     * @access public
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}
