<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Party</title>
    <style>
        .form-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        .form-container h2 {
            text-align: center;
        }
        .form-container label {
            display: block;
            margin-bottom: 5px;
        }
        .form-container input[type="text"],
        .form-container input[type="tel"],
        .form-container input[type="number"],
        .form-container select,
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
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add New Party</h2>
        <form action="add_party.php" method="post">
            <label for="party_name">Party Name</label>
            <input type="text" id="party_name" name="party_name" placeholder="Enter Party Name" required>

            <label for="phone_number">Phone Number</label>
            <input type="tel" id="phone_number" name="phone_number" placeholder="Enter Phone Number" >

            <label for="opening_balance">Opening Balance</label>
            <input type="number" id="opening_balance" name="opening_balance" placeholder="Enter amount">

            <label for="you_gave">You Gave</label>
            <input type="number" id="you_gave" name="you_gave" placeholder="Enter amount" required>

            <label for="who_are_they">Who are they</label>
            <select id="who_are_they" name="who_are_they" required>
                <option value="customer">Customer</option>
            </select>

            <input type="submit" value="Submit">
        </form>
        <form action="transc.php" method="get"> <button type="submit">Go to Main Page</button> </form>


    </div>
</body>
</html>
