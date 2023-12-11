<script>
function setActiveLink() {
  const path = window.location.pathname;
  const links = document.querySelectorAll('.sidebar-link');

  links.forEach(link => {
    link.classList.remove('active');

    // Mengecek apakah bagian dari URL sesuai dengan href sidebar
    if (path.includes(link.getAttribute('href'))) {
      link.classList.add('active');
    }
  });
}

// Memanggil fungsi setActiveLink saat halaman dimuat
document.addEventListener('DOMContentLoaded', setActiveLink);
</script>


</body>
</html>