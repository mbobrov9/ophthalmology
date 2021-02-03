<?php
// Открытие сессии PHP
session_start();
?>

<?php

session_unset();

session_destroy();

exit('<meta http-equiv="refresh" content="0; url=index.php" />');
?>
</body>
</html>