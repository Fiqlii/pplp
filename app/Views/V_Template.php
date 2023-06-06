<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale= 1.0">
    <title><?= $title ?? "PPL" ?></title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
</head>

<body>
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->
    <table border="1" width= "100%" height = "720px">
        <th>
            <center>
                <h1>Header</h1>
            </center>
        </th>
        <tr>
            <td>
                <a href="/">Home</a>
                <a href="/info">Info</a>
                <a href="/mahasiswa">Mahasiswa</a>
                <a href="/logout">Logout</a>
                <a href="pegawai">Pegawai</a>
            </td>
        </tr>
        <tr>
            <td>
                <center>
                    <?= $this->renderSection('content') ?>
                </center>
            </td>
        </tr>
        <tr>
            <td>
                <center>
                    <h3>Footer</h3>
                </center>
            </td>
        </tr>
    </table>
</body>

</html>