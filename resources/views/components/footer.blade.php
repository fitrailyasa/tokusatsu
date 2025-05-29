<!-- Footer -->
<footer class="main-footer d-none d-sm-block">
  <strong>
    Copyright &copy; <span id="year"></span>
    <a href="#">{{ strtoupper(config('app.name')) }}</a>.
  </strong>
  All rights reserved.
</footer>
<!-- /.footer -->

<script>
  document.getElementById("year").textContent = new Date().getFullYear();
</script>
