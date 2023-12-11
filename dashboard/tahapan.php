
<?php 
$id = $_GET['id']; 

define('ID_VALUE', $id);
?> 
<?php  $peserta = "SELECT * FROM peserta WHERE id = $id";
$result = $mysqli->query($peserta);
$row = $result->fetch_assoc();
?>
<div class="menu">
                <a href="tahap1.php?id=<?php echo ID_VALUE; ?>">Tahap 1</a>
                <a href="tahap2.php?id=<?php echo ID_VALUE; ?>">Tahap 2</a>
                <a href="tahap3.php?id=<?php echo ID_VALUE; ?>">Tahap 3</a>
</div>