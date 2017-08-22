<?php

namespace Drupal\ow_lorem_ipsum\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Clase de ejemplo para implementar un ConfigForm.
 */
class SettingsForm extends ConfigFormBase {

  /**
   * Nombres de configuración que serán editados.
   *
   * @inheritdoc
   */
  protected function getEditableConfigNames() {
    return [
      'ow_lorem_ipsum.settings',
    ];
  }

  /**
   * ID de Formulario.
   *
   * @inheritdoc
   */
  public function getFormId() {
    return 'ow_lorem_ipsum_settings_form';
  }

  /**
   * Método en el que definimos los campos del formulario.
   *
   * @inheritdoc
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildForm($form, $form_state);
    $config = $this->config('ow_lorem_ipsum.settings');

    $form['paragraphs_amount'] = [
      '#type' => 'number',
      '#title' => $this->t('Paragraphs amount'),
      '#min' => 1,
      '#max' => 3,
      '#default_value' => $config->get('paragraphs_amount'),
    ];

    for ($i = 1; $i <= 3; $i++) {
      $form["paragraph_$i"] = [
        '#type' => 'textarea',
        '#title' => $this->t('Paragraph @number', ['@number' => $i]),
        '#default_value' => $config->get("paragraph_$i"),
      ];
    }

    $form['show_final_message'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Show final message'),
      '#default_value' => $config->get('show_final_message'),
    ];

    $form['final_message'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Final message'),
      '#default_value' => $config->get('final_message'),
    ];

    return $form;
  }

  /**
   * En este método guardamos la configuración.
   *
   * @inheritdoc
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $config = $this->config('ow_lorem_ipsum.settings');
    $config
      ->set('paragraphs_amount', $values['paragraphs_amount'])
      ->set('show_final_message', $values['show_final_message'])
      ->set('final_message', $values['final_message']);

    for ($i = 1; $i <= 3; $i++) {
      $config->set("paragraph_$i", $values["paragraph_$i"]);
    }

    $config->save();

    parent::submitForm($form, $form_state);
  }

}
