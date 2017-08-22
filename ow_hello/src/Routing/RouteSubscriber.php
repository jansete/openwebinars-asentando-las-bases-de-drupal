<?php

namespace Drupal\ow_hello\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Servicio que nos permite alterar las propiedades de las rutas.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * A través de este método podemos alterar rutas.
   */
  protected function alterRoutes(RouteCollection $collection) {
    if ($route = $collection->get('user.login')) {
      $route->setPath('/login');
    }
  }

}
