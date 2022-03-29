<?php

$db = new mysqli("localhost", "root", "", "zadanie_med");

?>

<form action="appointment.php">
Imię: <input type="text" name="FirstName">
Nazwisko: <input type="text" name="LastName">
Telefon: <input type="text" name="phone">
<input type="submit" value="Zapisz wizytę">
</form>


