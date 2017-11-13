<?php

namespace Holabs\Notify\Bridges\Tracy;

use Holabs\Notify\INotification;
use Holabs\Notify\INotifier;
use Nette\SmartObject;
use Nette\Utils\ArrayList;
use Tracy\IBarPanel;

/**
 * @author       Tomáš Holan <mail@tomasholan.eu>, Tomáš Holan [www.tomasholan.eu]
 * @package      holabs/notify
 * @copyright    Copyright © 2016, Tomáš Holan [www.tomasholan.eu]
 */
class NotifyPanel implements IBarPanel {

	use SmartObject;

	const TEMPLATE_DIR = __DIR__ . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR;
	const TAB_TEMPLATE = self::TEMPLATE_DIR . 'NotifyTab.phtml';
	const PANEL_TEMPLATE = self::TEMPLATE_DIR . 'NotifyPanel.phtml';

	/** @var ArrayList|INotification[] */
	private $notifications;

	/**
	 * @param INotifier $notifier
	 */
	public function __construct(INotifier $notifier) {
		$this->notifications = new ArrayList;
		$notifier->registerWorker([$this, 'addNotification']);
	}

	/**
	 * @param INotifier $notifier
	 * @param INotification     $notification
	 */
	public function addNotification(INotifier $notifier, INotification $notification) {
		$this->notifications[] = $notification;
	}

	/**
	 * @return string
	 */
	public function getTab() {
		$count = $this->notifications->count();

		if (!$count) {
			return NULL;
		}

		ob_start();
		require self::TAB_TEMPLATE;

		return ob_get_clean();
	}

	/**
	 * @return string|null
	 */
	public function getPanel() {

		$notifications = $this->notifications;
		$count = $this->notifications->count();

		if (!$count) {
			return NULL;
		}

		ob_start();
		require self::PANEL_TEMPLATE;

		return ob_get_clean();
	}

}
