<!-- Avalon Hosting Services -->
<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

    <h2>User List</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <?php foreach ($users as $user) { ?>
            <tr>
                <td><?= $user["id"] ?></td>
                <td><?= $user["name"] ?></td>
                <td><?= $user["email"] ?></td>
                <td><?= $user["phone"] ?></td>
                <td><?= $user["password"] ?></td>
                <td>
                    <img src="<?= $user["photo"] ?>" alt="" width="80">
                </td>
                <td>
                    <a href="">Edit</a>
                    <a href="">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>