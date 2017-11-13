<?php


namespace Holabs\Notify;

use Nette\Utils\Callback;


/**
 * @author       Tomáš Holan <mail@tomasholan.eu>
 * @package      holabs/notify
 * @copyright    Copyright © 2017, Tomáš Holan [www.tomasholan.eu]
 */
class Notifier implements INotifier {

	/** @var callable[]|array */
	protected $workers = [];

	/**
	 * @param string     $key
	 * @param array|null $params
	 * @param int        $priority
	 * @return INotification
	 */
	public function publish(string $key, array $params = NULL, int $priority = 10): INotification {

		$n = new Notification($key, $params, $priority);

		$this->onPublish($n);

		return $n;
	}

	/**
	 * @param callable $callback
	 * @return INotifier|Notifier
	 */
	public function registerWorker(callable $callback): INotifier {
		$this->workers[] = $callback;

		return $this;
	}

	/**
	 * @param INotification $notification
	 */
	protected function onPublish(INotification $notification) {
		foreach ($this->workers as $worker) {
			Callback::invoke($worker, $this, $notification);
		}
	}

}