<!-- Dusten Peterson | Web Development 3610 | PHP/Forms Practice -->

<?php include("top.html"); ?>

<!-- Create your form here -->
<form action="signup-submit.php" method="post">
  <fieldset>
  <legend>New User Signup:</legend>

    <ul>
      <li>
        <strong>Name:</strong>
        <input type="text" name="name" size="16" />
      </li>

      <li>
        <strong>Gender:</strong>
        <label><input type="radio" name="gender" value="M" />Male</label>
        <label><input type="radio" name="gender" value="F" checked />Female</label>
      </li>

      <li>
        <strong>Age:</strong>
        <input type="text" name="age" size="6" maxlength="2" />
      </li>

      <li>
        <strong>Personality type:</strong>
        <input type="text" name="personality" size="6" maxsize="4" />
        (<a href="http://www.humanmetrics.com/cgi-win/jtypes2.asp">Don't know your type?</a>)
      </li>

      <li>
        <strong>Favourite OS:</strong>
          <select name="OS">
            <option selected="selected">Windows</option>
            <option>Mac OS X</option>
            <option>Linux</option>
          </select>
      </li>

      <li>
        <strong>Seeking age:</strong>
        <input type=text name="minage" size="6" maxlength="2" value="min" onfocus="if (this.value=='min') this.value='';" /> to
        <input type="text" name="maxage" size="6" maxlength="2" value="max" onfocus="if (this.value=='max') this.value='';" />
      </li>
    </ul>

    <input type="submit" value="Sign Up">
  </fieldset>
</form>

<?php include("bottom.html"); ?>
