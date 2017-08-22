<?php

namespace Drupal\ow_hello;

/**
 * Clase sencilla para usar en el ejemplo de param converters.
 */
class Policeman {

  /**
   * Número de placa.
   *
   * @var int
   */
  private $plateNumber;

  /**
   * Método constructor.
   *
   * En él creamos un objeto policía a través de su número de placa.
   */
  public function __construct($plate_number) {
    $this->plateNumber = $plate_number;
  }

  /**
   * Método con el que obtenemos el número de placa del policía.
   */
  public function getPlateNumber() {
    return $this->plateNumber;
  }

}
