<?php

function endsWith( $haystack, $needle ) {
  $length = strlen( $needle );
  if( !$length ) {
      return true;
  }
  return substr( $haystack, -$length ) === $needle;
}

$arr = explode('/', $_SERVER['PHP_SELF'], 10);
$count = count($arr);
$dir = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'];
for ($i=0; $i < $count-1; $i++) {
  $dir .= (endsWith($dir, '/') ? '' : '/') . $arr[$i];
}
header('location: ' . $dir . '/up');
?>