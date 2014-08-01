<?php

/**
 * Created by PhpStorm.
 * User: Oleg Pavlin
 * Date: 01.08.14
 * Time: 16:46
 */

class blogActions extends sfActions
{
  private $model;

  public function preExecute()
  {
    $this->model = BlogModel::Instance();
  }

  public function executeIndex()
  {
    $this->postings = $this->model->getBlogEntries();
  }

  public function executeShow($request)
  {
    $entry = $this->model->getEntry($request->getParameter('id'));
    $this->entry = $entry;
  }
}