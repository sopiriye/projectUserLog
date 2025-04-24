<?php
$key = base64_encode(random_bytes(32));
echo "APP_KEY=" . $key;
?>