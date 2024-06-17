<footer class="py-4 text-center <?php if(isUrlName('/zongora') == true && (isset($_SESSION['verified']) == false || $_SESSION['verified'] == false)) {echo "onbottom";}?> "> 
  <i class="display-6">Játékra fel!</i>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="/js/script.js"></script>
<?php echo isUrlName('/zongora') ? '<script src="/js/pianoPage.js"></script>' : '' ?>
</body>
</html>