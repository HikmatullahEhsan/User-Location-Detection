<?php
$ip=null;
$ip = @$_REQUEST['REMOTE_ADDR']; // the IP address to query
$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
if($query && $query['status'] == 'success') {
  echo 'Hello visitor from '.$query['country'].', '.$query['city'].'!'.','.$query['query'];
} else {
  echo 'Unable to get location';
}
?>