<!-- Emails use the XHTML Strict doctype -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <!-- The character set should be utf-8 -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width" />
    <!-- Link to the email's CSS, which will be inlined into the email -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-emails@2.2.1/dist/foundation-emails.min.css" integrity="sha256-eCv+ZgspLOV4CCn3RbJ0zvEyFi3BYlGManp0JAJGXlQ=" crossorigin="anonymous">
    <style>
        body {
            padding: 1em;

        }

        td {
            text-align: center;
        }

    </style>
</head>

<body>
    <!-- Wrapper for the body of the email -->
    <table class="body" data-made-with-foundation>
        <tr>
            <!-- The class, align, and <center> tag center the container -->
            <td class="float-center" align="center" valign="top">
                <center>
                    <!-- MAİL İÇİ -->

                    <?php
                    include_once "./mysqlGoster.php";
                    ?>
                        <br />
                </center>
            </td>
        </tr>
    </table>
</body>

</html>
