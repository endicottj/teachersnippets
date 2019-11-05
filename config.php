<?php

$localhost_cleardb_url = "mysql://bb752530790438:c0b2b74a@us-cdbr-iron-east-05.cleardb.net/heroku_fc4bc88759cfb52?reconnect=true";

if(!getenv("CLEARDB_DATABASE_URL")) {
	putenv("CLEARDB_DATABASE_URL=$localhost_cleardb_url");
}

?>