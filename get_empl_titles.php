<?php
  /*--------
      function: get_empl_titles
      purpose: expects no parameters,
          expects to grab the requested employee from the
          submitted form,
          expects to grab username and password from the
          current session info,
          then tries to query for that employee's salary
          and display it "nicely"

      uses: hsu_conn_sess
            destroy_and_exit
  -------*/

function get_empl_titles()
{
    if ( (! array_key_exists('empl_choice', $_POST)) or
         (trim($_POST['empl_choice']) == "") or
         (! isset($_POST['empl_choice'])) )
    {
     	destroy_and_exit("no employee selected");
    }

    $empl_choice = htmlspecialchars(strip_tags($_POST["empl_choice"]));
    $username = strip_tags($_SESSION['username']);
    $password = $_SESSION['password'];
    $conn = hsu_conn_sess($username, $password);

    ?>

    <h2> Salary from employee: <?= $empl_choice ?> </h2>

    <ul>

    <?php
    $empl_salary_query = 'select salary
                         from employee
                         where empl_lname = :empl_choice
                         order by salary';

    $empl_salary_stmt = oci_parse($conn, $empl_salary_query);

    oci_bind_by_name($empl_salary_stmt, ":empl_choice",
                     $empl_choice);

    oci_execute($empl_salary_stmt, OCI_DEFAULT);

    while (oci_fetch($empl_salary_stmt))
    {
     	$next_salary = oci_result($empl_salary_stmt, "SALARY");

        ?>
	<li> $<?= $next_salary ?>.00 per hour. </li>
        <?php
    }
    ?>
    </ul>

    <form method="post"
              action="<?= htmlentities($_SERVER['PHP_SELF'],
                                       ENT_QUOTES) ?>">
            <fieldset>
            <legend> Next </legend>


 <input type="submit" name="another_salary"
 value="Another?" />

            <input type="submit" name="no_more_empl" value="Done" />
            </fieldset>
    </form>

    <?php
    oci_free_statement($empl_salary_stmt);
    oci_close($conn);
}
?>

