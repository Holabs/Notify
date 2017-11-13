<?php


namespace Holabs\Notify;

use DateTime;


/**
 * @author       Tomáš Holan <mail@tomasholan.eu>
 * @package      holabs/notify
 * @copyright    Copyright © 2017, Tomáš Holan [www.tomasholan.eu]
 */
interface INotification {

	/**
	 * @return string
	 */
	public function getKey(): string;

	/**
	 * @return DateTime
	 */
	public function getPublishDateTime(): DateTime;

	/**
	 * @return array|null
	 */
	public function getParams(): ?array;

	/**
	 * @return int
	 */
	public function getWeight(): int;

}