<?php

//echo $_GET['file'];
$rootpath = $_SERVER["DOCUMENT_ROOT"];
$file = $rootpath."Mangalamjobs/resume/".$_GET['file'];
/*echo $file;
exit;*/
                //$file = "attachments/article/105/Dorf-Ketal_CORCON-2014-Presentation.pdf";

            if (file_exists($file))
                {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: resume; filename='.basename($file));
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                ob_clean();
                flush();
                readfile($file);
                exit;
                }
?>