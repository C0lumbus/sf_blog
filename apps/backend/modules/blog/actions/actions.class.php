<?php
/**
 * Created by PhpStorm.
 * User: Oleg Pavlin
 * Date: 01.08.14
 * Time: 17:24
 */
 
class blogActions extends sfActions
{
  /**
   * @var BlogModel
   */
  private $model;
  public function preExecute()
  {
    $user = $this->getUser();

    if(!$user->hasCredential('admin'))
    {
      $this->redirect('login/index');
    }

    $this->model = BlogModel::Instance();
  }
  /**
   * @param $request
   */
  public function executeIndex($request)
  {
    $blogEntries = $this->model->getBlogEntries();

    $this->blogEntries = $blogEntries;
  }

  /**
   *
   */
  public function executeCreate($request)
  {
    $this->form = new AddForm();
    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('create'));
      if ($this->form->isValid())
      {
        $this->model->addEntry($this->form->getValues());
        // authenticate user and redirect them
        $this->redirect('blog/index');
      }
    }
  }

  /**
   *
   */
  public function executeEdit($request)
  {
    $this->form = new EditForm();
    $this->form->getValidator($this->form->getCSRFFieldName())->setOption('required', false);

    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('edit'));

      if ($this->form->isValid())
      {
        $this->model->updateEntry($this->form->getValues());
        $this->redirect('blog/index');
      }
    }

    $entryID = $request->getParameter('id');

    $entry = $this->model->getEntry($entryID);

    $entry['id'] = $entryID;

    $this->form->bind($entry);

  }

  /**
   * @param $request
   */
  public function executeDelete($request)
  {
    $entryID = $request->getParameter('id');
    $this->model->deleteEntry($entryID);

    $this->redirect('blog/index');
  }
}
