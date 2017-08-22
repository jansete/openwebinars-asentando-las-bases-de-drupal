<?php

namespace Drupal\ow_hello\Routing;

use Drupal\Core\ParamConverter\ParamConverterInterface;
use Drupal\ow_hello\Policeman;
use Symfony\Component\Routing\Route;

/**
 * Clase en la que implementamos nuestro custom param converter.
 */
class PolicemanParamConverter implements ParamConverterInterface {

  /**
   * Método que comprueba si una ruta va a usar este param converter.
   *
   * @inheritdoc
   */
  public function applies($definition, $name, Route $route) {
    return !empty($definition['type']) && $definition['type'] == 'policeman';
  }

  /**
   * Método que devuelve el elemento que será inyectado en el controlador.
   *
   * @inheritdoc
   */
  public function convert($value, $definition, $name, array $defaults) {
    return new Policeman($value);
  }

}
