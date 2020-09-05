<?php
/**
 * @param $user_name
 * @param $email
 * @param $npwh
 * @param $gender
 * @return string
 */
function get_sql_insert_statement($user_name, $gender, $email, $npwh)
{
    $insert_sql_for_register = "insert into phpua(uname, gender, email, password) values ('" .
        $user_name . "','" . $gender . "','" . $email . "','" . $npwh . "');";
    return $insert_sql_for_register;
}