<!DOCTYPE html>

<html>
    <head>
        <title></title>
    </head>

    <body>
        <?php
        if($msg != ''){
            echo $msg . '<br/>';
        }
        ?>
        <form method="post" action="<?= base_url() ?>test6/validate">
            <label for="field_username">Username</label>
            <input type="text" name="username" id="field_username"/>
            <br/>
            <label for="field_password">Password</label>
            <input type="password" name="password" id="field_password"/>
            <br/>
            <input type="submit" name="submit" value="login"/>
        </form>
    </body>
</html>