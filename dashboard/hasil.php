<?php 
include ('head.php');

require '../database/helpers.php';

$kalku = "SELECT * FROM hasil";
$run = mysqli_query($mysqli, $kalku);

$hasil_per_id = array();

while ($row = mysqli_fetch_assoc($run)) {
    $id = $row['id'];

    // Mengecek apakah ID sudah ada di array $hasil_per_id
    if (!isset($hasil_per_id[$id])) {
        $hasil_per_id[$id] = array();
    }

    // Menyimpan data ke dalam array berdasarkan ID
    $hasil_per_id[$id][] = array(
        'peserta_id' => $row['peserta_id'],
        'tahap1' => $row['tahap1'],
        'tahap2_absen' => $row['tahap2_absen'],
        'tahap2_nilai' => $row['tahap2_nilai'],
        'tahap3_absen1' => $row['tahap3_absen1'],
        'tahap3_absen2' => $row['tahap3_absen2'],
        'tahap3_absen3' => $row['tahap3_absen3'],
        'tahap3_absen4' => $row['tahap3_absen4'],
        'tahap3_absen5' => $row['tahap3_absen5']
        // Tambahkan kolom lain sesuai kebutuhan
    );
}
$bobot_tahap2_absen = 0.4;
$bobot_tahap2_nilai = 0.6;
$bobot_tahap3_absen = 0.2;

foreach ($hasil_per_id as $id => $data_per_id) {

    foreach ($data_per_id as $data) {
        $data_id = $data['peserta_id'];
        $tahap1 = 0;
        $tahap2 = 0;
        $tahap3 = 0;

        $tahap1 += ($data['tahap1'] * 0.1) * 100;
        $tahap2 += ($bobot_tahap2_absen * $data['tahap2_absen']) * 100;
        $tahap2 += (0.1 * ($bobot_tahap2_nilai * $data['tahap2_nilai'])) * 100;
        $tahap3 += ($bobot_tahap3_absen * ($data['tahap3_absen1'] + $data['tahap3_absen2'] + $data['tahap3_absen3'] + $data['tahap3_absen4'] + $data['tahap3_absen5']) * 100);
    
        
        $updatedata = "UPDATE hasilakhir SET tahap1 = '$tahap1', tahap2 = '$tahap2', tahap3 = '$tahap3' WHERE peserta_id = '$data_id'";
        mysqli_query($mysqli, $updatedata);
    }
}

$peserta = query("SELECT peserta.nama, hasilakhir.*
        FROM peserta 
        INNER JOIN hasilakhir ON peserta.id = hasilakhir.peserta_id");
  
?>
<?php include ('sidebar.php') ?>

<div class="latar">
<h1>Hasil Seleksi Peserta</h1>
    <div class="konten">
        
        <table>
            <tr>
                <th>No</th>
                <th style=" padding: 5px 0px;">Nama</th>
                <th style="text-align: center; padding: 5px 0px;">Tahap1</th>
                <th style="text-align: center; padding: 5px 0px;">Tahap2</th>
                <th style="text-align: center; padding: 5px 0px;">Tahap3</th>
                <th style="text-align: center; padding: 5px 0px;">Layak/Tidak</th>
            </tr>
            <?php $i = 1;?>
            <?php foreach ($peserta as $row) : ?>

            <tr>
            <td style=" padding: 10px 0px;"><?= $i; $i++ ?></td>
            <td style=" padding: 10px 0px;"><?= $row["nama"] ?></td>
            <td style="text-align: center; padding: 10px 0px;"><?= $row["tahap1"] ?>%</td>   
            <td style="text-align: center; padding: 10px 0px;"><?= $row["tahap2"] ?>%</td>   
            <td style="text-align: center; padding: 10px 0px;"><?= $row["tahap3"] ?>%</td>   
            <td style="text-align: center; padding: 10px 0px;"><?php if($row["tahap1"] > 60 && $row["tahap2"] > 60 && $row["tahap3"] > 60) { echo "Layak"; } else { echo "Tidak layak"; }?></td>   
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>

<?php include('footer.php') ?>