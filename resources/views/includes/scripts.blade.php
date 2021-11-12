<script src="/backend/vendor/jquery/jquery.slim.min.js"></script>
    <script src="/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script>
        $('#menu-toggle').click(function(e) {
            e.preventDefault();
            $('#wrapper').toggleClass('toggled');
        });
    </script>
    <script src="/backend/scripts/navbar-scroll.js"></script>
  </body>
</html>