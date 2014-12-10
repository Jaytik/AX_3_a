<?php

namespace App;

use Nette,
	Nette\Application\Routers\RouteList,
	Nette\Application\Routers\Route,
	Nette\Application\Routers\SimpleRouter;


/**
 * Router factory.
 */
class RouterFactory
{

	/**
	 * @return \Nette\Application\IRouter
	 */
	public function createRouter()
	{
		$router = new RouteList();
                $router[] = new Route('detail_<id>', 'Homepage:detail');
                $router[] = new Route('prihlas', 'Sign:in');
                $router[] = new Route('admin', 'Cms:membersControl');
                $router[] = new Route('<presenter>/<action>', 'Homepage:default');
		$router[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');
		return $router;
	}

}
