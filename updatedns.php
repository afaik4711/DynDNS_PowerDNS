<?php

include 'connect.php';

$counter = 0;

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $ipaddr = $_GET['ip'];
  $ip6addr = $_GET['ip6'];
  $hostname = $_GET['hostname'];

  if (!in_array(strtolower($hostname), $allowedhosts) ) {
  echo "Invalid hostname";
  exit;
  }

  //check if $ipaddr is a valid IPv4 address and update if yes
  if (filter_var($ipaddr, FILTER_VALIDATE_IP)) {

    $sql4 = "UPDATE records SET content='$ipaddr' WHERE name='$hostname' AND type='A'";
    $stmt4 = $conn->prepare($sql4);
    $stmt4->execute();
    $counter = $counter + $stmt4->rowCount();
  } else {
    echo "badip4 \n<br />\n<br />";
  }


  //check if $ip6addr is a valid IPv6 address and update if yes
  if (filter_var($ip6addr, FILTER_VALIDATE_IP)) {

    $sql6 = "UPDATE records SET content='$ip6addr' WHERE name='$hostname' AND type='AAAA'";
    $stmt6 = $conn->prepare($sql6);
    $stmt6->execute();
    $clounter = $counter + $stmt6->rowCount();
  } else {
    echo "badip6 \n<br />\n<br />";
  }

    echo $counter  . " records updated";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
