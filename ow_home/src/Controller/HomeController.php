<?php

namespace Drupal\ow_home\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Controlador con métodos para las rutas de prueba.
 */
class HomeController extends ControllerBase {

  /**
   * Método que devuelve el contenido para /home.
   */
  public function home() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Welcome home'),
    ];
  }

  /**
   * Método que devuelve el contenido para /home/kitchen.
   */
  public function kitchen() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('You can cook here :D'),
    ];
  }

  /**
   * Método que devuelve el contenido para /home/bathroom.
   */
  public function bathroom() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Take a shower please!'),
    ];
  }

  /**
   * Método que devuelve el contenido para /home/bedroom.
   */
  public function bedroom() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Are you ready for sleep? :)'),
    ];
  }

}
