<?php

namespace Drupal\ow_forms\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Clase de ejemplo FormBase.
 */
class HelloForm extends FormBase {

  /**
   * ID de formulario.
   *
   * @inheritdoc
   */
  public function getFormId() {
    return 'ow_forms_hello_form';
  }

  /**
   * Método en el que definimos los elementos del formulario.
   *
   * @inheritdoc
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#size' => 60,
      '#maxlength' => 10,
      '#required' => TRUE,
    ];

    $form['years'] = [
      '#type' => 'number',
      '#title' => $this->t('Years'),
      '#default_value' => 0,
      '#min' => 0,
      '#max' => 120,
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Display message'),
    ];

    return $form;
  }

  /**
   * Método encargado de implementar la lógica en el envío.
   *
   * @inheritdoc
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $years = $form_state->getValue('years');
    $message = $this->formatPlural($years,
      "Hello, my name is @name and I'm @count year old",
      "Hello, my name is @name and I'm @count years old", [
        '@name' => $form_state->getValue('name'),
      ]);

    drupal_set_message($message);
  }

  /**
   * Método encargado de la validación de los campos.
   *
   * @inheritdoc
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $name = $form_state->getValue('name');

    if ($name == 'Drupal') {
      $form_state->setErrorByName('name', $this->t('Name Drupal is not allowed.'));
    }
  }

}
