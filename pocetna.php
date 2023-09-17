<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo list</title>
</head>
<body>
    <h1>Todo List</h1>

    <table>
        <tr>
            <th>Task Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Assigned People</th>
            <th>Description</th>
        </tr>
        <?php include 'load_data.php'; ?>
    </table>
</body>
</html>