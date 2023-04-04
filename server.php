<?php

require_once('config.php');

if (isset($_POST['resultsid'])) {

    update_data($conn, $_POST['resultsid'], $_POST['field_name'], $_POST['value']);
}


function update_data($conn, $resultsid, $fieldName, $updatedValue)
{
    $query = "UPDATE example SET $fieldName='$updatedValue' WHERE resultsid=$resultsid";

    $exec = mysqli_query($conn, $query);

    if ($exec) {

        echo "data was updated";
    } else {
        $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
        echo $msg;
    }
}
