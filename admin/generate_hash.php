<?php
$hash = password_hash('admin123', PASSWORD_DEFAULT);
echo "<p>Hash untuk password <b>admin123</b>:</p><pre>$hash</pre>";
echo "<p>Salin ke kolom <code>password</code> di tabel <code>admin</code> via phpMyAdmin.</p>";