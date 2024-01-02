<?php
function tieneArchivo($nombreDelCampo) {
    return isset($nombreDelCampo) && $nombreDelCampo['error'] !== UPLOAD_ERR_NO_FILE;
}
?>