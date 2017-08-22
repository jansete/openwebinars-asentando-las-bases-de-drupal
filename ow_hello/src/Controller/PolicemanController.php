<?php

namespace Drupal\ow_hello\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\ow_hello\Policeman;

/**
 * Controlador que usaremos para mostrar la información de un policía.
 */
class PolicemanController extends ControllerBase {

  /**
   * Método que devolverá el contenido de la ruta ow_hello.policeman.
   */
  public function view(Policeman $policeman) {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Hello my plate number is: @plate_number', ['@plate_number' => $policeman->getPlateNumber()]),
    ];
  }

}
