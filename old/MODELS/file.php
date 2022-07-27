<?php

class File {

    public function __construct() {
    }

    public function deleteFile($filename) {
        unlink($filename);
    }

    public function downloadFile($file) {
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            exit;
        }
    }

    public function renameFile($oldname, $newname) {
        rename($oldname, $newname);
    }
    
    public function moveFile($filename, $destination){
        move_uploaded_file($filename, $destination);
    }

    public function __destruct() {
    }

}

?>
