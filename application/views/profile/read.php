<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome to My Profile</h1>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
        <?php foreach ($profileData as $profile) { ?>
            <tr>
                <td><?php echo $profile['name']; ?></td>
                <td><?php echo $profile['email']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
