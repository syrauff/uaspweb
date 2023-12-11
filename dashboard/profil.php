<?php include ('head.php');

require '../database/helpers.php';
$peserta = query("SELECT * FROM peserta");
?>
<?php include ('sidebar.php') ?>

<div class="latar">
    <h1>Data Pengurus</h1>
<form style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);" class="data-form">
    <div style="margin-bottom: 15px;">
      <label for="nama" style="display: block; font-weight: bold;">Nama:</label>
      <input type="text" id="nama" name="nama" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ccc;" required>
    </div>
    <div style="margin-bottom: 15px;">
      <label for="nim" style="display: block; font-weight: bold;">NIM:</label>
      <input type="text" id="nim" name="nim" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ccc;" required>
    </div>
    <div style="margin-bottom: 15px;">
      <label for="divisi" style="display: block; font-weight: bold;">Divisi:</label>
      <select id="divisi" name="divisi" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ccc;" required>
        <option hidden>Pilih Divisi</option>
        <option value="Programming">Divisi Programming</option>
        <option value="NOS">Divisi NOS</option>
        <option value="Design">Divisi Design Graphic</option>
        <option value="Cinema">Divisi Cinematography</option>
      </select>
    </div>
    <button type="submit" style="padding: 10px 20px; border: none; border-radius: 4px; background-color: #007bff; color: #fff; cursor: pointer; font-size: 16px;">Submit</button>
  </form>
</div>

<?php include('footer.php') ?>