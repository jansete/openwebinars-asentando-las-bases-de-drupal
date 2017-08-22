<?php

namespace Drupal\ow_lorem_ipsum\Controller;

use Drupal\Component\Render\HtmlEscapedText;
use Drupal\Core\Controller\ControllerBase;

/**
 * Controlador en el que mostraremos el resultado de nuestro Lorem Ipsum.
 */
class LoremIpsumController extends ControllerBase {

  /**
   * Método que devuelve el render array del Lorem Ipsum.
   */
  public function view() {
    // En el tema de servicios usaremos la inyección de dependencias.
    $config = \Drupal::config('ow_lorem_ipsum.settings');
    $build = [];

    $paragraphs_amount = $config->get('paragraphs_amount');

    for ($i = 1; $i <= $paragraphs_amount; $i++) {
      $build["paragraph_$i"] = [
        '#type' => 'markup',
        '#markup' => new HtmlEscapedText($config->get("paragraph_$i")),
        '#prefix' => '<div>',
        '#suffix' => '</div>',
      ];
    }

    if ($config->get('show_final_message')) {
      $build['show_final_message'] = [
        '#type' => 'markup',
        '#markup' => new HtmlEscapedText($config->get('final_message')),
        '#prefix' => '<div>',
        '#suffix' => '</div>',
      ];
    }

    return $build;
  }

}
