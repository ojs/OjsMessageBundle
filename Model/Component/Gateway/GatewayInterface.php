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

namespace Okulbilisim\MessageBundle\Model\Component\Gateway;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\QueryBuilder;
use Knp\Component\Pager\Paginator;

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
interface GatewayInterface
{
    /**
     *
     * @access public
     * @param \Doctrine\Common\Persistence\ObjectManager $em
     * @param string                                     $entityClass
     * @param \Knp\Component\Pager\Paginator             $paginator
     * @param string                                     $pagerTheme
     */
    public function __construct(ObjectManager $em, $entityClass, Paginator $paginator = null, $pagerTheme = null);

    /**
     *
     * @access public
     * @return string
     */
    public function getEntityClass();

    /**
     *
     * @access public
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getQueryBuilder();

    /**
     *
     * @access public
     * @param  Array                      $aliases = null
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function createSelectQuery(Array $aliases = null);

    /**
     *
     * @access public
     * @param  string                     $column  = null
     * @param  Array                      $aliases = null
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function createCountQuery($column = null, Array $aliases = null);

    /**
     *
     * @access public
     * @param  \Doctrine\ORM\QueryBuilder                   $qb
     * @param  Array                                        $parameters
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function one(QueryBuilder $qb, $parameters = array());

    /**
     *
     * @access public
     * @param  \Doctrine\ORM\QueryBuilder                   $qb
     * @param  Array                                        $parameters
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function all(QueryBuilder $qb, $parameters = array());

    /**
     *
     * @access public
     * @param  \Doctrine\ORM\QueryBuilder                               $qb
     * @param  int                                                      $itemsPerPage
     * @param  int                                                      $page
     * @return \Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination
     */
    public function paginateQuery(QueryBuilder $qb, $itemsPerPage, $page);

    /**
     *
     * @access public
     * @return \Okulbilisim\MessageBundle\Model\Component\Gateway\GatewayInterface
     */
    public function flush();
}
