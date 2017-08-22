<?php

namespace Drupal\ow_param_number;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;

/**
 * Clase en la que modificamos los servicios del contenedor.
 */
class OwParamNumberServiceProvider extends ServiceProviderBase {

  /**
   * En este método alteramos el servicio number_generator.
   *
   * En el método alter tenemos la oportunidad de swapear facilmente la clase
   * de un servicio, en este ejemplo, ahora usaremos nuestra clase ParamNumber
   * en lugar de la clase original del servicio.
   *
   * @inheritdoc
   */
  public function alter(ContainerBuilder $container) {
    if ($container->hasDefinition('ow_number_generator.number_generator')) {
      $container->getDefinition('ow_number_generator.number_generator')
        ->setClass('Drupal\ow_param_number\ParamNumber');
    }
  }

}
