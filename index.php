<!DOCTYPE html>
<html lang="en">

<head>
    <title>KALKULATOR PEACHYPUPPY</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Otomanopee+One&family=Qahiri&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body class="container" style="background-color: 	#CACAB2;">

    <?php
    error_reporting(0);



    if (isset($_POST['batch']) && isset($_POST['kr']) && isset($_POST['kurs']) && isset($_POST['won']) && isset($_POST['dflt']) && isset($_POST['ems']) && isset($_POST['fee'])) {
        $batch = (float) $_POST['batch'];
        $kr = (float) $_POST['kr'];
        $kurs = (float) $_POST['kurs'];
        $won = (float) $_POST['won'];
        $dflt = (float) $_POST['dflt'];
        $ems = (float) $_POST['ems'];
        $fee = (float) $_POST['fee'];
    } else {
        $batch = 1;
        $kr = 0;
        $kurs = 133000;
        $won = 0;
        // $dflt = 10000;
        // $ems = 6000;
        // $fee = 5000;
    }


    $bersihkr = round(($kurs * $won), 2);

    $se = round((($dflt + ($kr * $kurs)) / $batch), 2);
    $net = round(($bersihkr + $ems + $fee + $se), 2);
    $rp = "RP. ";

    ?>

    <div class="card container mt-5 mb-5 p-2" style="background-color:#EDEDED">
        <div class="container d-flex justify-content-center mt-5 mb-5">
            <h1 style="color:#506C46 ; font-family: 'Otomanopee One', sans-serif;" class="text-center">KALKULATOR PEACHYPUPPY</h1>
        </div>
        <div class="container col-12 mb-5">
            <form action="" method="POST" id="myForm">
                <div class="container d-flex justify-content-center row align-items-center d-block">
                    <label for="kurs" class="col-5 p-2 card " style="background-color: #506C46; font-family: 'Otomanopee One', sans-serif; color:white;">Kurs</label>
                    <div class="col-1">:</div>
                    <div class="col-1  font-weight-bold p-0">Rp</div>
                    <div class="card col font-weight-bold" style="background-color: #506C46; color:white">
                    <input readonly type="text" id="kurs" name="kurs" value="133000" style="background-color:#506C46; color:white; border: none; border-color: transparent; "></div>

                </div>

                <div class="container d-flex justify-content-center row align-items-center d-block">
                    <label for="monetary" class="col-5 p-2 card " style="background-color: #506C46; font-family: 'Otomanopee One', sans-serif; color:white;">Jumlah orang dalam batch</label>
                    <div class="col-1">:</div>
                    <div class="col-1"></div>
                    <div class="card col font-weight-bold"> <input style="border: none;border-color: transparent;" class="col" type="number" id="batch" name="batch" value="<?= $batch ?>" required pattern="[0-9]" step="1" min="0"></div>

                </div>
                <div class="container d-flex justify-content-center row align-items-center d-block">
                    <label for="tax" class="col-5 p-2 card " style="background-color: #506C46; font-family: 'Otomanopee One', sans-serif; color:white;"> Shipping KR</label>
                    <div class="col-1">:</div>
                    <div class="col-1"></div>
                    <div class="card col font-weight-bold"><input style="border: none;border-color: transparent;" class="col" type="number" id="kr" name="kr" value="<?= $kr ?>" required pattern="[0-9]" step="0.01" min="0" max="100"></div>

                </div>
                <div class="container d-flex justify-content-center row align-items-center d-block">
                    <label for="tax" class="col-5 p-2 card " style="background-color: #506C46; font-family: 'Otomanopee One', sans-serif; color:white;">Harga in WON</label>
                    <div class="col-1">:</div>
                    <div class="col-1"></div>
                    <div class="card col font-weight-bold"> <input style="border: none;border-color: transparent;" class="col" type="number" id="won" name="won" value="<?= $won ?>" required pattern="[0-9]" step="0.01" min="0" max="100"></div>

                </div>
                <div class="container  d-flex justify-content-center row align-items-center d-block mb-3 mt-3">
                    <input type="Submit" value="Hitung" id="calculateBtn" class="btn btn-dark font-weight-bold col">

                </div>
                <div class="container d-flex justify-content-center row align-items-center d-block">
                    <label for="bersihKR" class="col-5 p-2 card " style="background-color: #506C46; font-family: 'Otomanopee One', sans-serif; color:white;">Bersih KR</label>
                    <div class="col-1">:</div>
                    <div class="col-1 font-weight-bold p-0">Rp</div>
                    <div class="card col font-weight-bold" style="background-color: #667477"><input style="color:white;border: none;border-color: transparent; background-color: #667477" class="col" readonly type="text" id="bersihkr" name="besihkr" value=<?= $bersihkr ?>></div>

                </div>

                <div class="container d-flex justify-content-center">
                    <label hidden class="col-5 font-weight-bold p-2 card " style="background-color: #506C46; color:white;" for="dflt">Default</label>
                    <input class="col" hidden type="number" id="dflt" name="dflt" value="10000">
                </div>

                <div class="container d-flex justify-content-center row align-items-center d-block">
                    <label for="ems" class="col-5 p-2 card " style="background-color: #506C46; font-family: 'Otomanopee One', sans-serif; color:white;">EMS Tax</label>
                    <div class="col-1">:</div>
                    <div class="col-1 font-weight-bold p-0">Rp</div>
                    <div class="card col font-weight-bold" style="background-color: #A6D7DB"><input style="color:white;border: none;border-color: transparent;background-color: #A6D7DB" readonly class="col" type="text" id="ems" name="ems" value="6000"></div>

                </div>
                <div class="container d-flex justify-content-center row align-items-center d-block">
                    <label for="se" class="col-5 p-2 card " style="background-color: #506C46; font-family: 'Otomanopee One', sans-serif; color:white;">Share Fee</label>
                    <div class="col-1">:</div>
                    <div class="col-1 font-weight-bold p-0">Rp</div>
                    <div class="card col font-weight-bold" style="background-color: #667477"> <input style="color:white;border: none;border-color: transparent; background-color: #667477" class="col" readonly type="text" id="se" name="se" value=<?= $se ?>></div>


                </div>
                <div class="container d-flex justify-content-center row align-items-center">
                    <label for="fee" class="col-5 p-2 card " style="background-color: #506C46; font-family: 'Otomanopee One', sans-serif; color:white;">Fee lainnya</label>
                    <div class="col-1">:</div>
                    <div class="col-1 font-weight-bold p-0">Rp</div>
                    <div class="card col font-weight-bold" style="background-color: #A6D7DB"> <input style="color:white;background-color: #A6D7DB;border: none;border-color: transparent;" class="col" readonly type="text" id="fee" name="fee" value="5000"></div>

                </div>

                <div class="container  d-flex justify-content-center row align-items-center">
                    <label for="net" class="col-5 p-2 card " style="background-color: #506C46; font-family: 'Otomanopee One', sans-serif; color:white;">Net (Bersih INA)</label>
                    <div class="col-1">:</div>
                    <div class="col-1 font-weight-bold p-0">Rp</div>
                    <div class="card col font-weight-bold" style="background-color: #506C46; color:white;"><input style="background-color: #506C46; color:white;border: none;border-color: transparent;" class="col" readonly type="text" id="net" name="net" value=<?= $net ?>></div>


                </div>
            </form>
        </div>
    </div>
</body>

</html>
