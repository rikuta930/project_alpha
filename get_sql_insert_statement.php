<?php
/**
 * @param $user_name
 * @param $email
 * @param $npwh
 * @return string
 */
function get_sql_insert_statement($user_name, $email, $npwh)
{
    $insert_sql_for_register = "insert into phpua(uname,email, password) values ('" .
        $user_name . "','" . $email . "','" . $npwh . "');";
    return $insert_sql_for_register;
}