<?php

namespace Drupal\ow_forms\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Clase de ejemplo para usar un formulario desde un controlador.
 */
class HelloController extends ControllerBase {

  /**
   * Devolvemos un formulario custom.
   */
  public function customRetrieveForm() {
    // En el tema de servicios vemos como inyectar los servicios para su uso
    // con la inyección de dependencias.
    return \Drupal::formBuilder()->getForm('Drupal\ow_forms\Form\FormStateExampleForm');
  }

}
