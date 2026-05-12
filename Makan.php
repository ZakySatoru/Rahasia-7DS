<?php
$makan = ['Nasi Goreng','Mie Goreng','Sate Ayam','Soto Ayam','Bakso','Nasi Uduk'];
$harga = [15000,12000,20000,18000,17000,16000];

$menu = isset($_POST['menu']) ? $_POST['menu'] : '';
$banyak = isset($_POST['banyak']) ? $_POST['banyak'] : '';
$pembayaran = isset($_POST['pembayaran']) ? $_POST['pembayaran'] : '';

$total = 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Menu Makanan</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    background:linear-gradient(135deg,#141e30,#243b55);
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:20px;
}

.container{
    width:900px;
    background:white;
    border-radius:20px;
    padding:30px;
    box-shadow:0 10px 30px rgba(0,0,0,0.4);
    animation:muncul 1s ease;
}

@keyframes muncul{
    from{
        opacity:0;
        transform:translateY(30px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

h1{
    text-align:center;
    margin-bottom:25px;
    color:#243b55;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-bottom:25px;
}

table th{
    background:#243b55;
    color:white;
    padding:14px;
}

table td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

table tr:hover{
    background:#f2f2f2;
    transition:0.3s;
}

.form-box{
    background:#f7f7f7;
    padding:20px;
    border-radius:15px;
}

.input-group{
    margin-bottom:15px;
}

input,
select{
    width:100%;
    padding:14px;
    border:none;
    border-radius:10px;
    background:#243b55;
    color:white;
    font-size:16px;
    transition:0.3s;
}

input:focus,
select:focus{
    outline:none;
    background:#355c7d;
    box-shadow:0 0 10px #00bfff;
}

input::placeholder{
    color:#cfcfcf;
}

button{
    width:100%;
    padding:14px;
    border:none;
    border-radius:10px;
    background:linear-gradient(135deg,#00b09b,#96c93d);
    color:white;
    font-size:18px;
    cursor:pointer;
    transition:0.3s;
    font-weight:bold;
}

button:hover{
    transform:scale(1.03);
}

.hasil{
    margin-top:25px;
    background:#243b55;
    color:white;
    padding:20px;
    border-radius:15px;
    line-height:2;
    animation:muncul 0.8s ease;
}

.total{
    font-size:24px;
    color:#ffe600;
    font-weight:bold;
}

</style>

</head>
<body>

<div class="container">

    <h1>🍜 Daftar Menu Makanan 🍜</h1>

    <table>
        <tr>
            <th>No</th>
            <th>Menu</th>
            <th>Harga</th>
        </tr>

        <?php
        $jumlah = count($makan)-1;

        for($i=0; $i<=$jumlah; $i++){
        ?>

        <tr>
            <td><?= $i; ?></td>
            <td><?= $makan[$i]; ?></td>
            <td>Rp. <?= number_format($harga[$i],0,',','.'); ?></td>
        </tr>

        <?php } ?>

    </table>

    <div class="form-box">

        <form method="post">

            <div class="input-group">
                <input type="number" name="menu" placeholder="Masukkan nomor menu..." required>
            </div>

            <div class="input-group">
                <input type="number" name="banyak" placeholder="Jumlah beli..." required>
            </div>

            <div class="input-group">
                <select name="pembayaran" required>
                    <option value="">-- Pilih Pembayaran --</option>
                    <option value="QRIS">QRIS</option>
                    <option value="DANA">DANA</option>
                    <option value="OVO">OVO</option>
                </select>
            </div>

            <button type="submit" name="tombol">
                Pilih Menu
            </button>

        </form>

    </div>

    <?php

    if($menu !== '' && $banyak !== '' && $pembayaran !== ''){

        $total = $harga[$menu] * $banyak;

    ?>

    <div class="hasil">

        <h2>🧾 Detail Pesanan</h2>

        <p>Menu Dipilih : <?= $makan[$menu]; ?></p>

        <p>Harga Satuan : Rp. <?= number_format($harga[$menu],0,',','.'); ?></p>

        <p>Jumlah Beli : <?= $banyak; ?></p>

        <p>Pembayaran : <?= $pembayaran; ?></p>

        <p class="total">
            Total Bayar : Rp. <?= number_format($total,0,',','.'); ?>
        </p>

    </div>

    <?php } ?>

</div>

</body>
</html>