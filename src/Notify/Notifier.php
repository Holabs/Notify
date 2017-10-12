<?php


namespace Holabs\Notify;

use Nette\SmartObject;


/**
 * @author       Tomáš Holan <mail@tomasholan.eu>
 * @package      holabs/notify
 * @copyright    Copyright © 2017, Tomáš Holan [www.tomasholan.eu]
 *
 * @method onPublish(Notifier $sender, Notification $notification)
 */
class Notifier {

	use SmartObject;

	/** @var \Closure[]|callable[]|array */
	public $onPublish = [];

	/** @var array */
	private $excludedWorkers = [];

	/**
	 * @param string     $key
	 * @param array|null $params
	 * @param int        $priority
	 * @param array      $excludeWorkers
	 * @return Notification
	 */
	public function publish(string $key, array $params = NULL, int $priority = 10, array $excludeWorkers = []): Notification {

		$conf = isset($this->excludedWorkers[$key]) ? $this->excludedWorkers[$key] : [];
		$tmp = array_unique(array_merge($conf, $excludeWorkers));

		$n = new Notification($key, $params, $priority, $tmp);

		$this->onPublish($this, $n);

		return $n;
	}

	/**
	 * @param string   $name
	 * @param string[] ...$keys
	 * @return Notifier
	 */
	public function excludeWorker(string $name, string ... $keys): self {

		array_walk($keys, function($value) use ($name) {

			$tmp = $this->excludedWorkers[$value];
			$tmp[] = $name;
			$this->excludedWorkers[$value] = array_unique($tmp);

		});

		return $this;
	}
}