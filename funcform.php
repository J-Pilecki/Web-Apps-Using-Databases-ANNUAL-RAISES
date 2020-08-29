<?php

/* function funcform provides a form for the user to indicate use of the stored
   function.
*/

function funcform($username, $password)
{
   $conn = hsu_conn_sess($username, $password);

   ?>

   <form method="post"
         action="<?= htmlentities($_SERVER['PHP_SELF'],
                                  ENT_QUOTES) ?>">
   <fieldset>
      <legend> Give a $2 raise to an employee </legend>
      <input type="submit" name="sub" id = "jsbutton" value="yes" />
      <input type="submit" name="sub" value="no" />
   </fieldset>
   </form>

   <?php

}
?>
