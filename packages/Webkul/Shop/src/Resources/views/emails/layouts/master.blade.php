<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500" rel="stylesheet" type="text/css">
        
        <style type="text/css">
            @page {
                margin: 0px;
            }
            body {
                margin: 0px;
            }
            * {
                font-family: Verdana, Arial, sans-serif;
            }
            a {
                color: #fff;
                text-decoration: none;
            }
            table {
                font-size: x-small;
            }
            tfoot tr td {
                font-weight: bold;
                font-size: x-small;
            }
            .invoice table {
                margin: 15px;
            }
            .invoice h3 {
                margin-left: 15px;
            }
            .information {
                background-color: #ffffff;
                color: #000000;
            }
            .information .logo {
                margin: 5px;
            }
            .information table {
                padding: 10px;
            }
            hr.blackSolid {
                border-top: 1px solid black;
            }
            .table-custom {
                margin-left: 30px;
                margin-right: 50px;
                border: 1px solid black;
                border-collapse: collapse;
            }
        </style>
    </head>

    <body style="font-family: montserrat, sans-serif;">
        <div style="max-width: 1000px; margin-left: auto; margin-right: auto;">
            <div style="text-align: center;">
                {{ $header ?? '' }}
            </div>

            <div>
                {{ $slot }}

                {{ $subcopy ?? '' }}
            </div>
        </div>
    </body>
</html>
