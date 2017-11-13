<?php


namespace Holabs\Notify;

use \DateTime;

/**
 * @author       Tomáš Holan <mail@tomasholan.eu>
 * @package      holabs/notify
 * @copyright    Copyright © 2017, Tomáš Holan [www.tomasholan.eu]
 */
class Notification implements INotification {

	/** @var string */
	private $key;

	/** @var DateTime */
	private $time;

	/** @var array|null */
	private $params;

	/** @var int */
	private $weight;

	/**
	 * Notification constructor.
	 * @param string     $key
	 * @param array|null $params
	 * @param int        $weight
	 */
	public function __construct(string $key, array $params = NULL, int $weight = 10) {
		$this->time = new DateTime();
		$this->key = $key;
		$this->params = $params;
		$this->weight = $weight;
	}

	/**
	 * @return string
	 */
	public function getKey(): string {
		return $this->key;
	}

	/**
	 * @return DateTime
	 */
	public function getPublishDateTime(): DateTime {
		return $this->time;
	}

	/**
	 * @return array|null
	 */
	public function getParams(): ?array {
		return $this->params;
	}

	/**
	 * @return int
	 */
	public function getWeight(): int {
		return $this->weight;
	}


}