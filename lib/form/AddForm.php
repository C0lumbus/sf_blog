<?php

class AddForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'title' => new sfWidgetFormInput(),
      'content' => new sfWidgetFormTextarea()
    ));

    $this->widgetSchema->setNameFormat('create[%s]');

    $this->setValidators(array(
      'title' => new sfValidatorString(array('max_length' => 255, 'required' => true)),
      'content' => new sfValidatorString(array('max_length' => 255, 'required' => true))
    ));
  }
}