<?php
/**
 * Created by PhpStorm.
 * User: †KôKšPfLâÑzè®
 * Date: 14.08.14
 * Time: 21:16
 */

namespace PServerCMS\Service;

use PServerAdmin\Mapper\HydratorNews;
use PServerCMS\Entity\Users;
use PServerCMS\Keys\Caching;
use PServerCMS\Keys\Entity;

class News extends InvokableBase {
	/** @var \PServerAdmin\Form\News */
	protected $newsForm;

	/**
	 * @return \PServerCMS\Entity\News[]
	 */
	public function getActiveNews(){

		$newsInfo = $this->getCachingHelperService()->getItem(Caching::News, function() {
			/** @var \PServerCMS\Entity\Repository\News $repository */
			$repository = $this->getEntityManager()->getRepository(Entity::News);
			return $repository->getActiveNews();
		});

		return $newsInfo;
	}

	/**
	 * @return null|\PServerCMS\Entity\News[]
	 */
	public function getNews(){
		/** @var \PServerCMS\Entity\Repository\News $repository */
		$repository = $this->getEntityManager()->getRepository(Entity::News);
		return $repository->getNews();
	}

	/**
	 * @param $newsId
	 *
	 * @return null|\PServerCMS\Entity\News
	 */
	public function getNews4Id( $newsId ){
		/** @var \PServerCMS\Entity\Repository\News $repository */
		$repository = $this->getEntityManager()->getRepository(Entity::News);
		return $repository->getNews4Id($newsId);
	}

	/**
	 * @param array $data
	 * @param Users $user
	 *
	 * @return bool|\PServerCMS\Entity\News
	 */
	public function news( array $data, Users $user ){
		$form = $this->getNewsForm();
		$form->setHydrator(new HydratorNews());
		$form->bind(new \PServerCMS\Entity\News());
		$form->setData($data);
		if(!$form->isValid()){
			return false;
		}

		/** @var \PServerCMS\Entity\News $news */
		$news = $form->getData();
		$news->setUser($this->getUser4Id($user->getUsrid()));
		
		//\Zend\Debug\Debug::dump($user);die();

		$entity = $this->getEntityManager();
		$entity->persist($news);
		//$entity->persist($user);
		$entity->flush();

		return $news;
	}

	/**
	 * @return \PServerAdmin\Form\News
	 */
	public function getNewsForm(){
		if (! $this->newsForm) {
			$this->newsForm = $this->getServiceManager()->get('pserver_admin_news_form');
		}

		return $this->newsForm;
	}
} 