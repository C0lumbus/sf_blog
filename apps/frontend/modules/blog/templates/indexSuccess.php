<?php
/**
 * Created by PhpStorm.
 * User: Oleg Pavlin
 * Date: 01.08.14
 * Time: 16:46
 */
 
 ?>

<h1>Here are all blog postings</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Content</th>
      <th>Created at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($postings as $posting): ?>
    <tr>
      <td><a href="<?php echo url_for('blog/show?id=' . $posting['id']) ?>"><?php echo $posting['id'] ?></a></td>
      <td><?php echo $posting['title'] ?></td>
      <td><?php echo $posting['content'] ?></td>
      <td><?php echo $posting['created_at'] ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="../backend_dev.php/login">New</a>