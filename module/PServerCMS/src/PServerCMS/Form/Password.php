<?php
/**
 * Created by PhpStorm.
 * User: †KôKšPfLâÑzè®
 * Date: 16.07.14
 * Time: 01:31
 */

namespace PServerCMS\Form;

use Zend\Form\Element;
use ZfcBase\Form\ProvidesEventsForm;

class Password extends ProvidesEventsForm {

	public function __construct() {
		parent::__construct();

		$this->add(array(
			'name' => 'password',
			'options' => array(
				'label' => 'Password',
			),
			'attributes' => array(
                'class' => 'form-control',
				'type' => 'password'
			),
		));

		$this->add(array(
			'name' => 'passwordVerify',
			'options' => array(
				'label' => 'Password Verify',
			),
			'attributes' => array(
                'class' => 'form-control',
				'type' => 'password'
			),
		));

		/*
		$this->add(array(
			'name' => 'security',
			'type' => 'Zend\Form\Element\Csrf'
		));
		*/

		$submitElement = new Element\Button('submit');
		$submitElement
			->setLabel('Submit')
			->setAttributes(array(
                'class' => 'btn btn-default',
				'type'  => 'submit',
			));

		$this->add($submitElement, array(
			'priority' => -100,
		));
		/**
		$csrf = new Element\Csrf('csrf');
		$this->add($csrf->getCsrfValidator());
		 */
	}
} 