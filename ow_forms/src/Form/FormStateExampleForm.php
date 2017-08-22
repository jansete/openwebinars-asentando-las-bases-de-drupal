<?php

namespace Drupal\ow_forms\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Clase de ejemplo para trabajar con los Form #states.
 */
class FormStateExampleForm extends FormBase {

  /**
   * ID del formulario.
   *
   * @inheritdoc
   */
  public function getFormId() {
    return 'ow_forms_form_state_example';
  }

  /**
   * Ejemplo de uso de un Form #state.
   *
   * @inheritdoc
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['show_field_name'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Show field name'),
    ];

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#size' => 60,
      '#maxlength' => 10,
      '#required' => TRUE,
      '#states' => [
        'visible' => [
          ':input[name=show_field_name]' => ['checked' => TRUE],
        ],
      ],
    ];

    return $form;
  }

  /**
   * Método submit que no usaremos en este ejemplo.
   *
   * @inheritdoc
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {}

}
