<?php

namespace Drupal\ow_stats\Controller;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\node\NodeInterface;

/**
 * Controlador para utilizar en los ejemplos.
 *
 * Este controlador no ha sido realizado en el curso, ha sido previamente
 * preparado para completar los ejemplos.
 */
class StatsController extends ControllerBase {

  /**
   * Método que devuelve el contenido para /stats.
   */
  public function stats() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Global custom stats coming soon.'),
    ];
  }

  /**
   * Método que devuelve el contenido para /node/{node}/stats.
   */
  public function nodeStats(NodeInterface $node) {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Node stats coming soon.'),
    ];
  }

  /**
   * Método que usamos como _custom_access en la ruta ow_stats.node_stats.
   *
   * Este método da acceso si el usuario actual es el usuario del nodo del que
   * queremos consultar sus estadísticas.
   */
  public function nodeStatsCustomAccess(
    AccountInterface $account,
    NodeInterface $node
  ) {
    return AccessResult::allowedIf($account->id() == $node->getOwnerId());
  }

}
