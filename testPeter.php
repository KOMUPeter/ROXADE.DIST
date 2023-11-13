<?php
// $mysqli = new mysqli("localhost", "username", "password", "database");

// my SQL query with a placeholder (?)
$sql = "SELECT * FROM my_table WHERE id = ?";

// Prepare the SQL statement
if ($stmt = $mysqli->prepare($sql)) {
    // Bind the parameter
    $id = 123; // Replace 123 with your actual parameter
    $stmt->bind_param("i", $id); // "i" indicates the parameter is an integer

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Fetch the data
    while ($row = $result->fetch_assoc()) {
        // Process the fetched data
        // For example:
        echo $row['column_name'] . "<br>";
    }

    // Close the statement
    $stmt->close();
} else {
    // Handle the failure to prepare the statement
    // For example:
    echo "Failed to prepare the statement.";
}



    $sql = "UPDATE * FROM users where useid = :useid";

    $stm = $this->databaseLink->prepare($sql);
    $stm->bindValue(':useid', $useid);
    $stm->execute();
    $result = $stm->fetch();



