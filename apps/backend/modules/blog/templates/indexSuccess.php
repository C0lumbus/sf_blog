<?php
/**
 * Created by PhpStorm.
 * User: Oleg Pavlin
 * Date: 01.08.14
 * Time: 17:27
 */
 
 ?>
<h1>List of blog entries</h1>

<ul>
<?php foreach($blogEntries as $entry) {
  echo "<li><a href=\"blog/edit/?id=" . $entry['id'] . "\">" . $entry['id'] . "</a> " . $entry['title'] . " " . $entry['created_at'] . " <a href=\"blog/delete/?id=" . $entry['id'] . "\">delete</a></li>";
}
?>
</ul>

<a href="blog/create">Add</a>