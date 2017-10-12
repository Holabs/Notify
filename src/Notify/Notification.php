<?php


namespace Holabs\Notify;


/**
 * @author       Tomáš Holan <mail@tomasholan.eu>
 * @package      holabs/notify
 * @copyright    Copyright © 2017, Tomáš Holan [www.tomasholan.eu]
 */
class Notification {

	/** @var string */
	private $key;

	/** @var array|null */
	private $params;

	/** @var int */
	private $weight;

	/** @var array */
	private $excludedWorkers = [];

	/**
	 * Notification constructor.
	 * @param string     $key
	 * @param array|null $params
	 * @param int        $weight
	 * @param array      $excludedWorkers
	 */
	public function __construct(string $key, array $params = NULL, int $weight = 10, array $excludedWorkers = []) {
		$this->key = $key;
		$this->params = $params;
		$this->weight = $weight;
		$this->excludedWorkers = $excludedWorkers;
	}

	/**
	 * @return string
	 */
	public function getKey(): string {
		return $this->key;
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

	/**
	 * @return array
	 */
	public function getExcludedWorkers(): array {
		return $this->excludedWorkers;
	}


}