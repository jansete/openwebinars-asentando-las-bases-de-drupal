<?php

namespace Drupal\ow_forms\Form;

use Drupal\Core\Form\ConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\node\NodeInterface;

/**
 * Clase de ejemplo de uso de los ConfirmForm.
 */
class ChangeNodeStatusConfirmForm extends ConfirmFormBase {

  /**
   * Propiedad en la que almacenaremos el route param.
   *
   * En esta propiedad almacenamos el nodo que tenemos como parametro de nuestra
   * ruta, de esta manera esta propiedad estará disponible en el resto de
   * métodos.
   *
   * @var \Drupal\node\NodeInterface
   */
  private $node;

  /**
   * Método en el que construimos el formulario.
   *
   * En nuestro caso lo usamos para setear el nodo que nos viene como parámetro
   * de la ruta. En los ConfirmForm no se suelen añadir más elementos que los
   * que nos proporciona la clase ConfirmFormBase.
   *
   * @inheritdoc
   */
  public function buildForm(array $form, FormStateInterface $form_state, NodeInterface $node = NULL) {
    $this->node = $node;
    return parent::buildForm($form, $form_state);
  }

  /**
   * ID del formulario.
   *
   * @inheritdoc
   */
  public function getFormId() {
    return 'ow_forms_change_node_status_confirm_form';
  }

  /**
   * Url a la que navegaremos si cancelamos el formulario.
   *
   * @inheritdoc
   */
  public function getCancelUrl() {
    return Url::fromRoute('entity.node.canonical', ['node' => $this->node->id()]);
  }

  /**
   * Pregunta de confirmación.
   *
   * @inheritdoc
   */
  public function getQuestion() {
    return $this->t('You are going to change node status for NID:@nid. Are you sure?', [
      '@nid' => $this->node->id(),
    ]);
  }

  /**
   * Método que se ejecuta en el envío del formulario.
   *
   * En nuestro ejemplo cambiamos el estado del nodo, de publicado a no
   * publicado y viceversa.
   *
   * @inheritdoc
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    if ($this->node->isPublished()) {
      $this->node->setUnpublished();
      $status = $this->t('unpublished');
    }
    else {
      $this->node->setPublished();
      $status = $this->t('published');
    }

    $this->node->save();

    drupal_set_message($this->t('Now node @nid has @status status', [
      '@nid' => $this->node->id(),
      '@status' => $status,
    ]));

    $form_state->setRedirectUrl($this->getCancelUrl());
  }

}
