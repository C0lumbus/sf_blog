<?php
/**
 * Created by PhpStorm.
 * User: Oleg Pavlin
 * Date: 01.08.14
 * Time: 17:22
 */
 
 ?>

<form action="<?php echo url_for('login/index') ?>" method="POST">
  <table>
    <?php echo $form ?>
    <tr>
      <td colspan="2">
        <input type="submit" />
      </td>
    </tr>
  </table>
</form>