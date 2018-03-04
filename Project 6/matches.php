<!-- Dusten Peterson | Web Development 3610 | PHP/Forms Practice -->

<?php include("top.html"); ?>

<!-- Create your form here -->
<div>
  <form action="matches-submit.php" method="get">
    <fieldset>
    <legend>Returning User:</legend>

    <ul>
      <li>
        <strong>Name:</strong>
        <input type="text" size="16" name="name" />
      </li>
    </ul>

      <input type="submit" value="View My Matches" />
    </fieldset>
  </form>
</div>

<?php include("bottom.html"); ?>
