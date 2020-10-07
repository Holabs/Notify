<?php


namespace Holabs\Notify\Bridges\Nette;

use Holabs\Notify\Bridges\Tracy\NotifyPanel;
use Holabs\Notify\Notifier;
use Nette\DI\CompilerExtension;


/**
 * @author       Tomáš Holan <mail@tomasholan.eu>
 * @package      holabs/notify
 * @copyright    Copyright © 2017, Tomáš Holan [www.tomasholan.eu]
 */
class NotifyExtension extends CompilerExtension {

	public function loadConfiguration() {
		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('service'))
			->setFactory(Notifier::class);

		$builder->addDefinition($this->prefix('tracy'))
			->setFactory(NotifyPanel::class);
	}

}
