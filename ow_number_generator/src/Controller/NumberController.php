<?php

namespace Drupal\ow_number_generator\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\ow_number_generator\NumberGeneratorInterface;
use Drupal\ow_number_generator\UserMessage;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Controlador que usamos para mostrar el resultado del servicio.
 */
class NumberController extends ControllerBase {

  /**
   * Propiedad en la que almacenamos el servicio de generación de números.
   *
   * @var \Drupal\ow_number_generator\NumberGeneratorInterface
   */
  private $numberGenerator;

  /**
   * Propiedad en la que almacenamos el servicio de mensajes de usuario.
   *
   * @var \Drupal\ow_number_generator\UserMessage
   */
  private $userMessage;

  /**
   * Método constructor con las dependencias inyectadas.
   *
   * @param \Drupal\ow_number_generator\NumberGeneratorInterface $number_generator
   *   Servicio generador de números inyectado como dependencia.
   * @param \Drupal\ow_number_generator\UserMessage $user_message
   *   Servicio de mensajes de usuario inyectado como dependencia.
   */
  public function __construct(NumberGeneratorInterface $number_generator, UserMessage $user_message) {
    $this->numberGenerator = $number_generator;
    $this->userMessage = $user_message;
  }

  /**
   * Método que se ejecuta al instanciar el controlador.
   *
   * En este método añadimos las dependencias necesarias para que estas sean
   * inyectadas.
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('ow_number_generator.number_generator'),
      $container->get('ow_number_generator.user_message')
    );
  }

  /**
   * En este metodo devolvemos un mensaje de saludo y un número generado.
   */
  public function view() {
    $number = $this->numberGenerator->get();
    $hello_message = $this->userMessage->hello();
    return [
      '#type' => 'markup',
      '#markup' => $hello_message . '. ' . $this->t('The number is @number', ['@number' => $number]),
    ];
  }

}
