<!-- jika error = script.js:20 Uncaught TypeError: $.ajax is not a function
    at HTMLAnchorElement.<anonymous> (script.js:20)
    at HTMLAnchorElement.dispatch (jquery-3.3.1.slim.min.js:2)
    at HTMLAnchorElement.v.handle (jquery-3.3.1.slim.min.js:2) -->
<!-- ganti jquery dengan ini = https://code.jquery.com/jquery-3.2.1.min.js  -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="<?= BASEURL; ?>/js/bootstrap.js"></script>
<script src="<?= BASEURL; ?>/js/script.js"></script>
</body>
</html>