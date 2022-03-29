<?php

$db = new mysqli("localhost", "root", "", "zadanie_med");

$q = $db->prepare("SELECT * FROM staff");

if($q->execute()) {
    $result = $q->get_result();
    while($row = $result->fetch_assoc()) {
        $staff_id = $row['id'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        echo "Lekarz $firstName $lastName:<br>";
        $q = $db->prepare("SELECT * FROM schedule WHERE staff_id = ?");
        $q->bind_param("i",$staff_id);
        if($q->execute()) {
            $schedule = $q->get_result();
            while($visit = $schedule->fetch_assoc()) {
                $timestamp = strtotime($visit['date']);
                echo "<button style =\"margin:10px;\">";
                echo date("j/m/Y H:i", $timestamp);
                echo "</button>";
            }
        }
        echo "<br>";
    }
} else {
    echo "Błąd podczas wyszukiwania w bazie danych";
}

?>