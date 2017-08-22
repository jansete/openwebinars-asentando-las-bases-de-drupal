<?php

namespace Drupal\ow_home\Form;

use Drupal\Core\Form\ConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\node\NodeInterface;

/**
 * ConfirmForm para completar el ejemplo.
 *
 * Esta clase no está desarrollada en el curso, la teníamos ya preparada para
 * el ejemplo.
 */
class EatFoodConfirmForm extends ConfirmFormBase {

  /**
   * Nodo que obtenemos del parámetro de la ruta.
   *
   * @var \Drupal\node\NodeInterface
   */
  private $node;

  /**
   * ID del formulario.
   *
   * @inheritdoc
   */
  public function getFormId() {
    return 'ow_home_eat_food_confirm_form';
  }

  /**
   * Url a la que nos dirigimos si cancelamos el formulario.
   *
   * @inheritdoc
   */
  public function getCancelUrl() {
    return Url::fromRoute('view.pantry.page');
  }

  /**
   * Pregunta de confirmación.
   *
   * @inheritdoc
   */
  public function getQuestion() {
    return $this->t('You are going to eat @title. Are you sure?', ['@title' => $this->node->label()]);
  }

  /**
   * Método de procesamiento de datos en el envío del formulario.
   *
   * Cuando hacemos click en enlace "Eat" dentro de un contenido food nos
   * comeremos el alimento (lo pasamos a no publicado).
   *
   * @inheritdoc
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->node->setUnpublished();
    $this->node->save();

    if ($this->node->get('field_food_tasty')->value) {
      $message = $this->t('Mmmmmmmmmmmmm, it was delicius.');
    }
    else {
      $message = $this->t('Ñam, ñam, ñam.');
    }

    drupal_set_message($message);

    // Necesitamos eliminar el query parameter destination cuando venimos de un
    // enlace contextual siempre y cuando queramos posteriormente redigir al
    // usuario a otra página.
    \Drupal::request()->query->remove('destination');

    $form_state->setRedirectUrl($this->getCancelUrl());
  }

  /**
   * En este método obtenemos el route param y lo almacenamos.
   *
   * @inheritdoc
   */
  public function buildForm(array $form, FormStateInterface $form_state, NodeInterface $node = NULL) {
    $this->node = $node;
    return parent::buildForm($form, $form_state);
  }

}
