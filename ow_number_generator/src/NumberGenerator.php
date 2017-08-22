<?php

namespace Drupal\ow_number_generator;

/**
 * Clase que usaremos como servicio para generar números.
 */
class NumberGenerator implements NumberGeneratorInterface {

  /**
   * Método que devuelve un número.
   *
   * @inheritdoc
   */
  public function get() {
    return rand(0, 10);
  }

}
