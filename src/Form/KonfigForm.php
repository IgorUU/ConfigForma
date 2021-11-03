<?php

namespace Drupal\config_forma\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class KonfigForm extends ConfigFormBase
{

  const SETTINGS = 'forma.settings';
  /**
   * @return string
   */
  public function getFormId()
  {
    return 'config_forma';
  }

  /**
   * @return array|string
   */
  protected function getEditableConfigNames()
  {
    return [
      static::SETTINGS,
    ];
  }

  /**
   * @param array $form
   * @param FormStateInterface $form_state
   * @return array
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {

    $config = $this->config(static::SETTINGS);

    $form['Ime'] = [
      '#type' => 'textfield',
      '#title' => 'Ime',
      '#placeholder' => 'Ime',
      '#default_value' => $config->get('Ime')
    ];

    $form['Prezime'] = [
      '#type' => 'textfield',
      '#title' => 'Prezime',
      '#placeholder' => 'Prezime',
      '#default_value' => $config->get('Prezime')
    ];

    $form['BrojTel'] = [
      '#type' => 'textfield',
      '#title' => 'Broj telefona',
      '#default_value' => $config->get('BrojTel')
    ];

    $form['Email'] = [
      '#type' => 'email',
      '#title' => 'Email',
      '#default_value' => $config->get('Email')
    ];

    return parent::buildForm($form, $form_state);
  }

//  public function validateForm(array &$form, FormStateInterface $form_state)
//  {
//    parent::validateForm($form, $form_state);
//  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $this->configFactory->getEditable(static::SETTINGS)
      ->set('Ime', $form_state->getValue('Ime'))
      ->set('Prezime', $form_state->getValue('Prezime'))
      ->set('BrojTel', $form_state->getValue('BrojTel'))
      ->set('Email', $form_state->getValue('Email'))
      ->save();

    parent::submitForm($form, $form_state);
  }
}
