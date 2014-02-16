<?php
function pg_connection_string()
{

}

$db = pg_connect(pg_connection_string());

if (!$db)
{
	echo "Database connection error."
	exit;
}

$result = pg_query($db, "SELECT statement goes here");

?>