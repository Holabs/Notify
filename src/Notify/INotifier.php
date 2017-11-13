<?php


namespace Holabs\Notify;


/**
 * @author       Tomáš Holan <mail@tomasholan.eu>
 * @package      holabs/notify
 * @copyright    Copyright © 2017, Tomáš Holan [www.tomasholan.eu]
 */
interface INotifier {

	/**
	 * @param string     $key
	 * @param array|NULL $params
	 * @param int        $priority
	 * @return INotification
	 */
	public function publish(string $key, array $params = NULL, int $priority = 10): INotification;

	/**
	 * @param callable $callback
	 * @return INotifier
	 */
	public function registerWorker(callable $callback): self;

}