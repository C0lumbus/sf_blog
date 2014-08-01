<?php
/**
 * Created by PhpStorm.
 * User: Oleg Pavlin
 * Date: 01.08.14
 * Time: 17:27
 */
 
 ?>

<h1>Edit form</h1>

<form action="<?php echo url_for('blog/edit') ?>" method="POST">
  <table>
    <?php echo $form ?>
    <tr>
      <td colspan="2">
        <input type="submit" />
      </td>
    </tr>
  </table>
  <?php $form['_csrf_token']->render(); ?>
</form>
