<?php

require_once __DIR__ . '/AbstractTest.php';

use SeleniumClient\Alert;
use SeleniumClient\By;

class AlertTest extends AbstractTest
{
	private $_alert = null;

	public function setUp()
	{
		parent::setUp();
		$this->_alert = new Alert($this->_driver);
	}
	
	public function testGetAlertShouldGetAlertText()
	{
		$this->_driver->findElement(By::id("btnAlert"))->click();

		$alertText = $this->_alert->getText();

		$this->assertEquals("Here is the alert", $alertText);
	}
	
	public function testGetAlertShouldDismissAlert()
	{
		$this->_driver->findElement(By::id("btnConfirm"))->click();

		$this->_alert->dismiss();

		$alertText = $this->_alert->getText();

		$this->assertEquals("false", $alertText);
	}

	public function testGetAlertShouldAcceptAlert()
	{
		$this->_driver->findElement(By::id("btnConfirm"))->click();

		$this->_alert->accept();

		$alertText = $this->_alert->getText();

		$this->assertEquals("true", $alertText);
	}

	public function testGetAlertShouldSendKeysToAlert()
	{
		$this->_driver->findElement(By::id("btnPrompt"))->click();

		$this->_alert->sendKeys("alert text");
		$this->_alert->accept();

		$alertText = $this->_alert->getText();

		$this->assertEquals("alert text", $alertText);
	}
}