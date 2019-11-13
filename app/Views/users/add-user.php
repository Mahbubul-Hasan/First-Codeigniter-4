<!-- <?php

        use Config\Services;
        ?> -->
<!-- Avalon Hosting Services -->
<!DOCTYPE html>
<html>

    <body>
        <!-- <?= Services::validation()->listErrors() ?> -->
        <h2>Add User</h2>

        <form action="/add/user" method="POST" enctype="multipart/form-data">
            Name:<br>
            <input type="text" name="name" placeholder="Name">
            <br><br>
            Email:<br>
            <input type="email" name="email" placeholder="Email">
            <br><br>
            Phone:<br>
            <input type="text" name="phone" placeholder="Phone">
            <br><br>
            Password:<br>
            <input type="password" name="password" placeholder="Password">
            <br><br>
            Photo:<br>
            <input type="file" name="photo" accept="image/*">
            <br><br>
            <input type="submit" value="Submit">
        </form>
    </body>

</html>