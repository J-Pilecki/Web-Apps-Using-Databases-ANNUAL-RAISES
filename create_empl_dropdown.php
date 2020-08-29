
<?php
    /*---
	function: create_empl_dropdown

        purpose: expects a username and password,
            returns nothing, and tries to build a form including
            a drop-down of data from the employee table.
    ---*/

    function create_empl_dropdown($username, $password)
    {
     	$conn = hsu_conn_sess($username, $password);
        ?>
	<form method="post"
              action="<?= htmlentities($_SERVER['PHP_SELF'],
                                       ENT_QUOTES) ?>">
            <fieldset>
            <legend> Select Employee </legend>
            <?php
            $empl_query = 'select empl_lname
                          from employee
                          order by empl_lname';
            $empl_stmt = oci_parse($conn, $empl_query);
            oci_execute($empl_stmt, OCI_DEFAULT);
            ?>
            <label for="empl_choice"> Employee: </label>
            <select name="empl_choice" id="empl_choice">
            <?php
            while (oci_fetch($empl_stmt))
            {
             	 $curr_empl = oci_result($empl_stmt, "EMPL_LNAME");
                 ?>
                 <option value="<?= $curr_empl ?>">
                     <?= $curr_empl ?> </option>
                 <?php
            }
            oci_free_statement($empl_stmt);
            oci_close($conn);
            ?>
            </select>
            <div class="submit">
                <input type="submit" value="submit" />
            </div>
            </fieldset>
        </form>
        <?php
    }
?>

