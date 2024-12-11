<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Parties</title>
    <style>
        .form-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            text-align: center;
        }
        .form-container label {
            display: block;
            margin-bottom: 5px;
        }
        .form-container input[type="text"],
        .form-container input[type="date"],
        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .results-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .results-container table {
            width: 100%;
            border-collapse: collapse;
        }
        .results-container table, th, td {
            border: 1px solid black;
        }
        .results-container th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Search Parties</h2>
        <form action="search_parties.php" method="post">
            <label for="party_name">Party Name</label>
            <input type="text" id="party_name" name="party_name" placeholder="Enter Party Name" required>

            <label for="start_date">Start</label>
            <input type="date" id="start_date" name="start_date" value="2024-12-01" required>

            <label for="end_date">End</label>
            <input type="date" id="end_date" name="end_date" value="2024-12-31" required>

            <input type="submit" value="Search">
        </form>
        <form action="transc.php" method="get"> <button type="submit">Go to Main Page</button> </form>

    </div>

    <div class="results-container">
        <?php
        include("conn.php");
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['party_name'], $_POST['start_date'], $_POST['end_date'])) {
                $party_name = $_POST['party_name'];
                $start_date = $_POST['start_date'];
                $end_date = $_POST['end_date'];

                // Input validation
                if (!empty($party_name) && !empty($start_date) && !empty($end_date)) {
                    // Search query
                    $stmt = $conn->prepare("SELECT * FROM parties WHERE party_name = :party_name AND date BETWEEN :start_date AND :end_date");
                    $stmt->bindParam(':party_name', $party_name);
                    $stmt->bindParam(':start_date', $start_date);
                    $stmt->bindParam(':end_date', $end_date);

                    if ($stmt->execute()) {
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if ($results) {
                            echo "<table>";
                            echo "<thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Party Name</th>
                                        <th>Phone Number</th>
                                        <th>Opening Balance</th>
                                        <th>You Gave</th>
                                        <th>Who are they?</th>
                                        <th>Date</th>
                                    </tr>
                                  </thead>";
                            echo "<tbody>";
                            foreach ($results as $row) {
                                echo "<tr>
                                        <td>".$row['id']."</td>
                                        <td>".$row['party_name']."</td>
                                        <td>".$row['phone_number']."</td>
                                        <td>".$row['opening_balance']."</td>
                                        <td>".$row['you_gave']."</td>
                                        <td>".$row['who_are_they']."</td>
                                        <td>".$row['date']."</td>
                                      </tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                        } else {
                            echo "No results found.";
                        }
                    } else {
                        echo "Error: " . $stmt->errorInfo()[2];
                    }
                } else {
                    echo "Please fill in all required fields.";
                }
            } else {
                echo "Please fill in all required fields.";
            }
        }
        ?>
    </div>



</body>
</html>
