<?php

class EditForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'id' => new sfWidgetFormInputHidden(),
      'title' => new sfWidgetFormInput(),
      'content' => new sfWidgetFormTextarea()
    ));

    $this->widgetSchema->setNameFormat('edit[%s]');

    $this->setValidators(array(
      'title' => new sfValidatorString(array('max_length' => 255, 'required' => true)),
      'content' => new sfValidatorString(array('max_length' => 255, 'required' => true)),
      'id' => new sfValidatorString(array('max_length' => 255, 'required' => true))
    ));
  }
}