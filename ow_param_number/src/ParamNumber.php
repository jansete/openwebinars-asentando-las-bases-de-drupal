<?php

namespace Drupal\ow_param_number;

use Drupal\ow_number_generator\NumberGeneratorInterface;

/**
 * Clase que utilizaremos para el servicio de generador de números.
 */
class ParamNumber implements NumberGeneratorInterface {

  /**
   * Método que devuelve un número a traves de los parámetros del contenedor.
   *
   * @inheritdoc
   */
  public function get() {
    $ow_param_number = \Drupal::getContainer()->getParameter('ow_param_number');
    return !empty($ow_param_number['param']) ? $ow_param_number['param'] : 0;
  }

}
