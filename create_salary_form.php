<?php
    /*---
	function: create_salary_form

        purpose: expects TWO parameters, a username and password,
            returns nothing, and tries to build a form including
            a textbox to enter a new salary.
    ---*/

    function create_salary_form($username, $password)
    {
     	$conn = hsu_conn_sess($username, $password);
        ?>
	<form method="post"
              action="<?= htmlentities($_SERVER['PHP_SELF'],
                                       ENT_QUOTES) ?>">
            <fieldset>
                <legend> Enter New Salary: </legend>
                <label for="salary_entry"> Salary: </label>
                <input type="number" name="salary" id="salary_entry"
                       required="required" />
            </fieldset>
            <input type="submit" value="submit" />
        </form>
        <?php
    }
?>
