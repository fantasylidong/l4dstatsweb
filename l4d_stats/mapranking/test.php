<?php

// Create database connection
$servername = "10.0.0.4";
$username = "root";
$password = "fantasydong@";
$dbname = "l4d2stats";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query for available options
$sql = "SELECT DISTINCT anneversion, mode, sinum, sitime, usebuy, auto FROM timedmaps;";
$result = $conn->query($sql);

// Create HTML form
echo "<form method='post'>";
echo "<label for='anneversion'>Anneversion:</label>";
echo "<select id='anneversion' name='anneversion'>";
foreach ($result as $row) {
    echo "<option value='{$row['anneversion']}'>{$row['anneversion']}</option>";
}
echo "</select><br>";
echo "<label for='mode'>Mode:</label>";
echo "<select id='mode' name='mode'>";
foreach ($result as $row) {
    echo "<option value='{$row['mode']}'>{$row['mode']}</option>";
}
echo "</select><br>";
echo "<label for='sinum'>Sinum:</label>";
echo "<select id='sinum' name='sinum'>";
foreach ($result as $row) {
    echo "<option value='{$row['sinum']}'>{$row['sinum']}</option>";
}
echo "</select><br>";
echo "<label for='sitime'>Sitime:</label>";
echo "<select id='sitime' name='sitime'>";
foreach ($result as $row) {
    echo "<option value='{$row['sitime']}'>{$row['sitime']}</option>";
}
echo "</select><br>";
echo "<label for='usebuy'>Usebuy:</label>";
echo "<select id='usebuy' name='usebuy'>";
foreach ($result as $row) {
    echo "<option value='{$row['usebuy']}'>{$row['usebuy']}</option>";
}
echo "</select><br>";
echo "<label for='auto'>Auto:</label>";
echo "<select id='auto' name='auto'>";
foreach ($result as $row) {
    echo "<option value='{$row['auto']}'>{$row['auto']}</option>";
}
echo "</select><br>";
echo "<input type='submit' value='Submit'>";
echo "</form>";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get selected options
    $anneversion = $_POST["anneversion"];
    $mode = $_POST["mode"];
    $sinum = $_POST["sinum"];
    $sitime = $_POST["sitime"];
    $usebuy = $_POST["usebuy"];
    $auto = $_POST["auto"];

    // Build SQL query using prepared statement
    $stmt = $conn->prepare("SELECT * FROM timedmaps WHERE anneversion=? AND mode=? AND sinum=? AND sitime=? AND usebuy=? AND auto=?;");
    $stmt->bind_param("siiiii", $anneversion, $mode, $sinum, $sitime, $usebuy, $auto);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display query results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Map: {$row['map']}<br>";
            echo "Gamemode: {$row['gamemode']}<br>";
            echo "Difficulty: {$row['difficulty']}<br>";
            echo "Steam ID: {$row['steamid']}<br>";
            echo "Plays: {$row['plays']}<br>";
            echo "Time: {$row['time']}<br>";
            echo "Players: {$row['players']}<br>";
            echo "Modified: {$row['modified']}<br>";
            echo "Created: {$row['created']}<br>";
            echo "Mutation: {$row['mutation']}<br>";
            echo "Mode: {$row['mode']}<br>";
            echo "Sinum: {$row['sinum']}<br>";
            echo "Sitime: {$row['sitime']}<br>";
            echo "Usebuy: {$row['usebuy']}<br>";
            echo "Auto: {$row['auto']}<br>";
            echo "Anneversion: {$row['anneversion']}<br><br>";
        }
    } else {
        echo "No results found.";
    }

    // Close prepared statement
    $stmt->close();
}

$conn->close();

?>