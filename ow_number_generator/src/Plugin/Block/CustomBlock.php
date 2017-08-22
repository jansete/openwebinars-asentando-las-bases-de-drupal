<?php

namespace Drupal\ow_number_generator\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Session\AccountProxyInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Definición de un bloque custom.
 *
 * @Block(
 *  id = "ow_number_generator_custom_block",
 *  admin_label = @Translation("OW Number Generator Custom block"),
 *  category = @Translation("Custom"),
 * )
 */
class CustomBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Propiedad que almacena al usuario actual.
   *
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  private $currentUser;

  /**
   * Método constructor con las dependencias inyectadas.
   *
   * @param array $configuration
   *   Configuración del plugin.
   * @param string $plugin_id
   *   ID del plugin.
   * @param mixed $plugin_definition
   *   Definición del plugin.
   * @param \Drupal\Core\Session\AccountProxyInterface $current_user
   *   Objeto con el usuario actual.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, AccountProxyInterface $current_user) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);

    $this->currentUser = $current_user;
  }

  /**
   * Método que se ejecuta al instanciar el plugin.
   *
   * En este método añadimos las dependencias necesarias para que estas sean
   * inyectadas a continuación de los parámetros propios de los plugins.
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('current_user')
    );
  }

  /**
   * Método que devuelve el contenido del bloque.
   */
  public function build() {
    $name = $this->currentUser->getDisplayName();
    return [
      '#type' => 'markup',
      '#markup' => new TranslatableMarkup('Hello @name', ['@name' => $name]),
    ];
  }

}
