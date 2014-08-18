<?php
/**
 * Created by PhpStorm.
 * User: †KôKšPfLâÑzè®
 * Date: 18.08.14
 * Time: 22:19
 */

namespace PServerCMS\Entity\Repository;

use Doctrine\ORM\EntityRepository;


class PageInfo extends EntityRepository {

	/**
	 * @return \PServerCMS\Entity\PageInfo
	 */
	public function getPageData4Type( $type ) {
		$query = $this->createQueryBuilder('p')
			->select('p')
			->where('p.type = :type')
			->setParameter('type', $type)
			->orderBy('p.created', 'desc')
			->getQuery();

		return $query->getOneOrNullResult();
	}
} 