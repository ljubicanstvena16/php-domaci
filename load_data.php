<?php
    require_once 'connection.php';

    $query = "SELECT * FROM todo";
    $result = mysqli_query($conn, $query);

    // Fetch and display data
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['nazivTaska'] . "</td>";
            echo "<td>" . $row['datumPocetka'] . "</td>";
            echo "<td>" . $row['datumZavrsetka'] . "</td>";
            echo "<td>" . $row['osobeTaska'] . "</td>";
            echo "<td>" . $row['opisTaska'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No tasks found</td></tr>";
    }

    // Close database connection
    mysqli_close($conn);
?>