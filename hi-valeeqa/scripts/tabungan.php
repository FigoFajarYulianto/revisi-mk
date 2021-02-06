<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Icon Title -->
    <link rel="icon" href="../images/hi_valeeqa.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .pembungkus {
            margin-top: 200px;
            margin-bottom: 100px;
        }
        .col-7 {
            padding: 0px;
            margin-right: 3px;
        }
        .col-4 {
            margin-left: 3px;
            padding: 0px;
        }
        .row {
            padding: 5px;
        }
        .tab-tabung {
            width: 100%;
            color: #000000;
            background: #fbf1f0;
            padding: 18px;
            border: #fbf1f0 3px solid;
            text-transform: uppercase;
            text-align: left;
            margin: 0px;
        }
        .item-tabung {
            width: 100%;
            background: #f6f6f6;
            padding: 15px;
            font-size: 12px;
            margin-top: 5px;
        }
        .img-item {
            width: 80px;
            height: 120px;
            border: 1px solid #dfdfdf;
            padding: 2px;
            margin: 0px;
        }
        .jumlah-tabung {
            width: 90px;
            height: 20px;
            display: inline;
        }
        .tb-item {
            width: 100%;
        }
        .tb-item td {
            width: 15%;
            vertical-align: top;
            text-align: right;
        }
        .tb-item td + td {
            width: 85%;
        }
        .tab-detail {
            color: #ffffff;
            width: 100%;
            padding: 18px;
            background: #000000;
            border:#000000 3px solid;
            margin: 0px;
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
        }
        .box-detail {
            border: #000000 3px solid;
            margin: 0px;
            background: #ffffff;
            color: #000000;
            padding: 20px;
        }
        .detail-jumlah {
            margin: 0px;
        }
        .lokasi {
            font-weight: bold;
        }
        .tb-detail {
            width: 100%;
        }
        .tb-detail td {
            width: 65%;
            text-align: left;
            padding-bottom: 15px;
            vertical-align: text-top;
        }
        .tb-detail td + td {
            width: 35%;
            text-align: left;
        }
        hr {
            background-color: black;
        }
        .bayar {
            background: #000000;
            border: 1px solid #000000;
            color: #ffffff;
            height: 40px;
            width: 200px;
            cursor: pointer;
            text-transform: uppercase;
            text-align: center;
            padding: 5px;
            margin-left: auto;
            margin-right: auto;
        }
        .batal {
            background: #ffffff;
            border: 1px solid #000000;
            color: #000000;
            height: 40px;
            width: 200px;
            cursor: pointer;
            text-transform: uppercase;
            text-align: center;
            padding: 5px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
  </head>
  <body>
    <?php include "nav.php"; ?>
    <div class="pembungkus">
    <div class="container">
        <div class="row">
            <div class="col-7">
                <div class="tab-tabung">Tabungan</div>
                <div class="item-tabung">
                    <table class="tb-item">
                        <tr>
                            <td><div style="text-align: left;"><img src="https://raw.githubusercontent.com/monokuro49/Kelompok3_TIF19_C_WSI/master/web-project/images/detail/img2.png" alt="" class="img-item"></div></td>
                            <td style="text-align: left;">
                                <span style="font-size: 18px;font-weight: bold;">Chayra Abaya</span><br>
                                Grey<br><br>
                                <span style="font-size: 14px;font-weight: bold;">Rp. 150.000</span><br>
                                Jumlah <input type="number" name="jumlah" id="" class="form-control jumlah-tabung">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><span style="font-size: 20px;font-weight: bold;text-align: right;">Rp. 150.000</span></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-4">
                <div class="tab-detail">Detail</div>
                <div class="box-detail">
                    <div class="detail-jumlah">
                        <table class="tb-detail">
                            <tr>
                                <td>Total</td>
                                <td>Rp. 450.000</td>
                            </tr>
                            <tr>
                                <td>Est. Pengiriman <br>
                                    <span class="lokasi">JBR-BWI</span></td>
                                <td>Rp. 10.000</td>
                            </tr>
                            <tr>
                                <td>Grand Total</td>
                                <td>Rp. 460.000</td>
                            </tr>
                        </table>
                        <hr>
                        <table class="tb-detail">
                            <tr>
                                <td>Terbayar</td>
                                <td>Rp. 200.000</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: red;">- Rp. 250.000</span></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: #2f80ed;">17</span>/30</td>
                            </tr>
                        </table><br>
                        <center><button class="bayar">Bayar Tabungan</button></center><br>
                        <center><button class="batal">Batalkan</button>
                        </div></center>
                </div>
            </div>
        </div>
    </div>
    </div>
    
    <?php include "footer.php"; ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
