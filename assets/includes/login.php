<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <style>
        @media only screen and (max-width: 758px) {
            .marginAtas {
                margin-top: 75% !important;
            }
        }

        body {
            background-color: turquoise;
            font-weight: bold;
        }

        fieldset {
            width: 25%;
        }

        .keTengah {
            margin: 0 auto;
        }

        .panjangTr {
            height: 40px;
        }

        .legenda {
            font-size: 20px;
            text-align: center;
        }

        .marginAtas {
            margin-top: 17%;
        }
    </style>
</head>

<body>
    <section>
        <form action="" method="POST" class="marginAtas">
            <fieldset class="keTengah">
                <legend class="legenda">
                    Masuk
                </legend>
                <table>
                    <tr>
                        <td>
                            <label for="uname">
                                Username
                            </label>
                        </td>
                        <td>
                            <input type="text" name="username" id="uname">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pass">
                                Password
                            </label>
                        </td>
                        <td>
                            <input type="password" name="password" id="pass">
                        </td>
                    </tr>
                    <tr class="panjangTr">
                        <td colspan="2">
                            <button name="masuk" type="submit">Masuk</button>
                            <button name="reset" type="reset">Reset</button>
                            &nbsp; <a href="../../">dashboard</a>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
        <?php
            require "functions.php";
            if(isset($_POST["masuk"])){
                masuk($_POST);
            }
        ?>
    </section>
</body>

</html>