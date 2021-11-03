<?php

namespace Drupal\config_forma\Controller;

use Drupal\Core\Controller\ControllerBase;

class KonfigController extends ControllerBase
{
  public function pokusaj()
  {
    $config = \Drupal::config('forma.settings');
    return [
      '#title' => $config->get('Ime').' '.$config->get('Prezime'),
      '#markup' => $config->get('BrojTel').'</br>'.$config->get('Email')
  ];
  }
}
