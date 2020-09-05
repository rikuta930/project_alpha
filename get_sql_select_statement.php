<?php
/**
 * @param $email
 * @return string
 */
function get_sql_select_statement($email)
{
    $select_sql_for_register = "select * from phpua where email='" . $email . "';";
    return $select_sql_for_register;
}