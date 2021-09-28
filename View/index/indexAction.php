<div>
    <h1>
        Hello This is a Test Of PHP MVC
    </h1>
    <table >
        <tr>
            <th>UserName</th>
            <th>Email</th>
        </tr>
        <?php
        foreach ($data['data']['users'] as $user) {
        ?>
            <tr>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>