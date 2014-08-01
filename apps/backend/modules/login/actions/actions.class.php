<?php
/**
 * Created by PhpStorm.
 * User: Oleg Pavlin
 * Date: 01.08.14
 * Time: 17:13
 */
 

class loginActions extends sfActions
{
  /**
   * @param $request
   */
  public function executeIndex($request)
  {
    $this->form = new LoginForm();

    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('login'));
      if ($this->form->isValid())
      {
        // authenticate user and redirect them
        $this->getUser()->setAuthenticated(true);
        $this->getUser()->addCredential('admin');
        $this->redirect('blog/index');
      }
    }
  }

  /**
   *
   */
  public function executeLogout()
  {
    $this->getUser()->clearCredentials();
    $this->getUser()->setAuthenticated(false);
    $this->redirect('@homepage');
  }
}
