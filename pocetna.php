<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.5/dist/css/foundation.min.css" crossorigin="anonymous">

    <title>Todo list</title>
</head>
<body>
<div class="grid-container">
        <h1>Todo List</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Task Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Assigned People</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'load_data.php'; ?>
            </tbody>
        </table>

        <button class="button alert" id="logoutButton">Odjavi se :( </button>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.5/dist/js/foundation.min.js" crossorigin="anonymous"></script>
    <script>

        function logout() {
            window.location.href = "index.html";
        }

        // Attach event listener to the logout button
        $("#logoutButton").on("click", logout);
    
    </script>
</body>
</html>