<?php
include('connection.php');
session_start();

if (isset($_POST['key'])) {

    if ($_POST['key'] == 'insert') {
        $todo_id = $_POST['todo_id'];

        $userid = $_SESSION['userid'];
        $nazivTaska = $_POST['nazivTaska'];
        $datumPocetka = $_POST['datumPocetka'];
        $datumZavrsetka = $_POST['datumZavrsetka'];
        $osobeTaska = $_POST['osobeTaska'];
        $opisTaska = $_POST['opisTaska'];

        // Validacija datuma
        $startDateTime = DateTime::createFromFormat('Y-m-d', $datumPocetka);
        $endDateTime = DateTime::createFromFormat('Y-m-d', $datumZavrsetka);

        if ($startDateTime === false || $endDateTime === false || $startDateTime > $endDateTime) {
            echo "Neispravan unos datuma. Datum pocetka mora biti pre datuma zavrsetka taska. Takodje proveri da li unosis datum u ispravnom formatu YY-MM-DD.";
        } else {
            $check = mysqli_query($conn, "SELECT * FROM todo WHERE todo_id = '$todo_id'");

            if (mysqli_num_rows($check) > 0) {
                echo "Isti task " . $naziv . ", već postoji!";
            } else {
                $sql = "INSERT INTO `todo` (`todo_id`,`nazivTaska`, `datumPocetka`, `datumZavrsetka`,`osobeTaska`,`opisTaska`,`userid`) VALUES ('$todo_id','$nazivTaska', '$datumPocetka', '$datumZavrsetka', '$osobeTaska', '$opisTaska', '$userid')";

                if ($conn->query($sql) === TRUE) {
                    echo "Ubacen novi task!";
                } else {
                    echo "Takav task vec postoji!";
                }
            }
        }
    }



    if ($_POST['key'] == 'load') {

        $userid = $_SESSION['userid'];
        $start = $conn->real_escape_string($_POST['start']);
        $limit = $conn->real_escape_string($_POST['limit']);
        $sort = $conn->real_escape_string($_POST['sort']);
        $sql = $conn->query("SELECT todo_id, nazivTaska, datumPocetka, datumZavrsetka, osobeTaska, opisTaska FROM todo WHERE userid = $userid ORDER BY $sort LIMIT $start, $limit");

        if ($sql->num_rows > 0) {
            $response = "";
            while ($data = $sql->fetch_array()) {

                $response .= '
                                <tr>
                                    <td id="todo_' . $data["todo_id"] . '">' . $data["todo_id"] . '</td>
                                    <td>' . $data["nazivTaska"] . '</td>
                                    <td>' . $data["datumPocetka"] . '</td>
                                    <td>' . $data["datumZavrsetka"] . '</td>
                                    <td>' . $data["osobeTaska"] . '</td>
                                    <td>' . $data["opisTaska"] . '</td>
                                    <td>
                                        <input type="button" onclick="izmeniPogledaj(' . $data["todo_id"] . ', \'izmeni\')" value="IZMENA" class="btn btn-primary">
                                        <input type="button" onclick="izmeniPogledaj(' . $data["todo_id"] . ', \'pogledaj\')" value="DETALJNIJI PREGLED" class="btn btn-warning">
                                        <input type="button" onclick="izbrisi(' . $data["todo_id"] . ')" value="BRISANJE" class="btn btn-danger">
                                    </td>
                                </tr>
                            ';
            }
            exit($response);
        } else
            exit('reachedMax');
    }



    if ($_POST['key'] == 'delete') {
        $todo_id = $conn->real_escape_string($_POST['todo_id']);
        $conn->query("DELETE FROM todo WHERE todo_id='$todo_id'");
        exit('Task je obrisan!');
    }

    if ($_POST['key'] == 'getData') {
        $todo_id = $conn->real_escape_string($_POST['todo_id']);
        $sql = $conn->query("SELECT todo_id, nazivTaska, datumPocetka, datumZavrsetka, osobeTaska, opisTaska FROM todo WHERE todo_id = $todo_id");
        $data = $sql->fetch_array();
        $jsonArray = array(
            'todo_id' => $data['todo_id'],
            'nazivTaska' => $data['nazivTaska'],
            'datumPocetka' => $data['datumPocetka'],
            'datumZavrsetka' => $data['datumZavrsetka'],
            'osobeTaska' => $data['osobeTaska'],
            'opisTaska' => $data['opisTaska']
        );
        exit(json_encode($jsonArray));
    }


    if ($_POST['key'] == 'update') {

        $trenutni_red = $conn->real_escape_string($_POST['todo_id']);

        $nazivTaska = $_POST['nazivTaska'];
        $datumPocetka = $_POST['datumPocetka'];
        $datumZavrsetka = $_POST['datumZavrsetka'];
        $osobeTaska = $_POST['osobeTaska'];
        $opisTaska = $_POST['opisTaska'];



        $sql = "UPDATE todo SET nazivTaska='$nazivTaska', datumPocetka='$datumPocetka', datumZavrsetka='$datumZavrsetka', osobeTaska='$osobeTaska',opisTaska='$opisTaska' WHERE todo_id='$trenutni_red'";
        if ($conn->query($sql) === TRUE) {
            echo "Uspešno izmenjen task!";
        } else {
            echo "Task nije izmenjen!";
        }

    }
}

mysqli_close($conn);

?>