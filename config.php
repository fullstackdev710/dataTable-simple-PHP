<?php
$conn = new mysqli('localhost', 'root', '', 'alan_gold_db');

if ($conn->connect_errno) {
   echo "Error: " . $conn->connect_error;
}
