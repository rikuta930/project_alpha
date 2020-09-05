<?php
/**
 * @param $userid
 * @param $profile
 * @return string
 */
function get_sql_insert_into_user_profile_statement($userid, $profile)
{
    $sql = "insert into user_profile(uid, profile)
  values('" . $userid . "','" . $profile .
        "');";
    return $sql;
}