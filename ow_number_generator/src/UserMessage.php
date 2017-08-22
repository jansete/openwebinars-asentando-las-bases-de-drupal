<?php

namespace Drupal\ow_number_generator;

use Drupal\Core\Session\AccountProxyInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Clase que usaremos como servicio para mostrar mensajes de usuario.
 */
class UserMessage {

  /**
   * Propiedad que almacena al usuario actual.
   *
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  private $currentUser;

  /**
   * Método constructor con las dependencias inyectadas.
   *
   * @param \Drupal\Core\Session\AccountProxyInterface $current_user
   *   Objeto con el usuario actual.
   */
  public function __construct(AccountProxyInterface $current_user) {
    $this->currentUser = $current_user;
  }

  /**
   * Mensaje de saludo al usuario.
   */
  public function hello() {
    return new TranslatableMarkup('Hello @user', ['@user' => $this->currentUser->getDisplayName()]);
  }

}
