<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metode Biseksi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            /* background-color: gray; */
            background-image: url(bg/bg.jpeg);
            background-size: cover;
            background-repeat: no-repeat;
        }
        #container {
            background-color: rgba(90, 120, 160, 0.9);
            position: relative;
            background-position: center;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: white;
            overflow: hidden;
        }
        h2 {
            margin-bottom: 20px;
        }
        .form-control-sm {
            width: 100%;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container mt-5" id="container">
        <h2 class="text-center">Metode Biseksi</h2>
        <div class="container">
            <p>Carilah akar persamaan <strong>f(x) = x^3 - 2x^2 + 4</strong></p>
            <?php
                function persamaan($x) {
                    return pow($x, 3) - 2 * pow($x, 2) + 4;
                }

                $a = isset($_GET['a']) ? $_GET['a'] * 1 : 0;
                $b = isset($_GET['b']) ? $_GET['b'] * 1 : 0;
                $n = isset($_GET['n']) ? $_GET['n'] * 1 : 0;
            ?>
            <form id="form1" name="form1" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group row">
                    <label for="a" class="col-sm-2 col-form-label">Batas Bawah (a)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" name="a" id="a" value="<?php echo $a; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="b" class="col-sm-2 col-form-label">Batas Atas (b)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" name="b" id="b" value="<?php echo $b; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="n" class="col-sm-2 col-form-label">Jumlah Iterasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" name="n" id="n" value="<?php echo $n; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <input class="btn btn-primary" type="submit" name="button" id="button" value="Proses">
                    </div>
                </div>
            </form>
            <?php
            if ($n > 0) {
                $fa = persamaan($a);
                $fb = persamaan($b);

                if ($fa * $fb >= 0) {
                    echo "<div class='alert alert-danger'>f(a) * f(b) > 0, proses dihentikan karena tidak ada akar!</div>";
                } else {
            ?>
            <table class="table table-bordered table-hover table-sm mt-3">   
                <thead class="thead-light text-center">
                    <tr>
                        <th>Iterasi</th>
                        <th>a</th>
                        <th>b</th>
                        <th>c</th>
                        <th>f(c)</th>
                        <th>f(a)</th>
                        <th>Aksi</th>
                    </tr>  
                </thead>
                <tbody>
                <?php
                    for ($k = 1; $k <= $n; $k++) {
                        $x = ($a + $b) / 2;
                        $fx = persamaan($x);
                        $ket = ($fa * $fx < 0) ? "a = c" : "b = c";

                        // Output baris tabel
                        echo "<tr>";
                        echo "<td class='text-center font-weight-bold'>" . $k . "</td>";
                        echo "<td class='text-center font-weight-bold'>" . number_format($a, 5, ",", ".") . "</td>";
                        echo "<td class='text-center font-weight-bold'>" . number_format($b, 5, ",", ".") . "</td>";
                        echo "<td class='text-center font-weight-bold'>" . number_format($x, 5, ",", ".") . "</td>";
                        echo "<td class='text-center font-weight-bold'>" . number_format($fx, 5, ",", ".") . "</td>";
                        echo "<td class='text-center font-weight-bold'>" . number_format($fa, 5, ",", ".") . "</td>";
                        echo "<td class='text-center font-weight-bold'>" . $ket . "</td>";
                        echo "</tr>";

                        // Update nilai a atau b
                        if ($fa * $fx < 0) {
                            $b = $x;
                            $fb = $fx;
                        } else {
                            $a = $x;
                            $fa = $fx;
                        }
                    }
                ?>
                </tbody>
            </table>

            <?php
                }
            }
            ?>
        </div>
    </div>  
</body>
</html>
