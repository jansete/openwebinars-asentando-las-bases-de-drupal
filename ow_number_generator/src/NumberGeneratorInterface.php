<?php

namespace Drupal\ow_number_generator;

/**
 * Interfaz para la generación de números.
 *
 * El uso de esta interfaz aportará flexibilidad en el servicio y también ayuda
 * a los desarrolladores a saber qué métodos tienen que implementar si quieren
 * sustituir la clase del servicio.
 */
interface NumberGeneratorInterface {

  /**
   * Método que devuelve un número.
   */
  public function get();

}
