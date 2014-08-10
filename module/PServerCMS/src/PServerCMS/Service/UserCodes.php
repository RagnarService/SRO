<?php
/**
 * Created by PhpStorm.
 * User: †KôKšPfLâÑzè®
 * Date: 15.07.14
 * Time: 18:46
 */

namespace PServerCMS\Service;


use PServerCMS\Entity\Users;
use PServerCMS\Helper\Format;
use PServerCMS\Keys\Entity;
use SmallUser\Service\InvokableBase;

class UserCodes extends InvokableBase {

	/**
	 * @var \Doctrine\Common\Persistence\ObjectRepository
	 */
	protected $repositoryManager;

	public function setCode4User( Users $oUserEntity, $sType, $iExpire = 0 ){
		$oEntityManager = $this->getEntityManager();

		$this->getRepositoryManager()->deleteCodes4User($oUserEntity->getUsrid(), $sType);

		do{
			$bFound = false;
			$sCode = Format::getCode();
			if($this->getRepositoryManager()->findOneBy(array('code' => $sCode))){
				$bFound = true;
			}
		}while($bFound);

		$oUserCodesEntity = new \PServerCMS\Entity\Usercodes();
		$oUserCodesEntity
			->setCode($sCode)
			->setUsersUsrid($oUserEntity)
			->setType($sType);

		if($iExpire){
			$oDateTime = new \DateTime();
			$oUserCodesEntity->setExpire($oDateTime->setTimestamp(time()+$iExpire));
		}

		$oEntityManager->persist($oUserCodesEntity);
		$oEntityManager->flush();

		return $sCode;
	}

	/**
	 * @return \Doctrine\Common\Persistence\ObjectRepository|\PServerCMS\Entity\Repository\Usercodes
	 */
	protected function getRepositoryManager(){
		if( !$this->repositoryManager ){
			$this->repositoryManager = $this->getEntityManager()->getRepository(Entity::UserCodes);
		}
		return $this->repositoryManager;
	}

}