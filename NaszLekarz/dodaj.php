if (isset($_POST['submit'])) {
    $pole1 = $_POST['pole1'];
    $pole2 = $_POST['pole2'];

    // Wykonaj zapytanie do dodania rekordu
    $sql = "INSERT INTO nazwa_tabeli (kolumna1, kolumna2) VALUES ('$pole1', '$pole2')";
    if ($conn->query($sql) === TRUE) {
        echo "Rekord został dodany.";
    } else {
        echo "Błąd dodawania rekordu: " . $conn->error;
    }
}
