<?php

namespace Drupal\ow_hello\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\UserInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Controlador que usaremos para probar el sistema de Routing.
 */
class HelloController extends ControllerBase {

  /**
   * Método que devolverá el contenido de la ruta ow_hello.hello_world.
   */
  public function helloWorld(Request $request) {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Hello world'),
    ];
  }

  /**
   * Método que devolverá el contenido de la ruta ow_hello.hello_name.
   */
  public function helloName($name) {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Hello @name', ['@name' => $name]),
    ];
  }

  /**
   * Método que devolverá el contenido de la ruta ow_hello.hello_user.
   */
  public function helloUser(UserInterface $user) {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Hello @user', ['@user' => $user->getDisplayName()]),
    ];
  }

  /**
   * Método que devolverá el contenido de la ruta ow_hello.hello_users.
   */
  public function helloUsers(UserInterface $user1, UserInterface $user2) {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Hello @user1 and @user2', [
        '@user1' => $user1->getDisplayName(),
        '@user2' => $user2->getDisplayName(),
      ]),
    ];
  }

}
