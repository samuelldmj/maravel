<?php
//This controller loads our views
trait Controllers
{

    public function views($name, $data = [])
    {
        //data will be extracted to or on the page that hold $data parameter.
        if (!empty($data)) {
            extract($data);
        }

        $filename = "../app/views/" . $name . ".view.php";
        if (file_exists($filename)) {
            require $filename;
        } else {
            $filename = "../app/views/404.view.php";
            require $filename;
        }
    }
}
