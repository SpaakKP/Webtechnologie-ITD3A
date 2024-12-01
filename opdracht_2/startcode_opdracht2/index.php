<?php

declare(strict_types=1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'startcode_opdracht2\transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);
setlocale(LC_MONETARY,"nl_NL");

/* HIER CODE (zie de instructies op Blackboard) */
$listOfFiles = scandir(FILES_PATH);
http://localhost:63342/startcode_opdracht2/index.php
for ($file = 2; $file < count($listOfFiles); $file++) {
    if ($file !== FALSE) {

        $link = "/startcode_opdracht2/index.php" . "?active_file=$listOfFiles[$file]";
        print "<a href='$link'>$listOfFiles[$file]<br></a>";
    }
}



$file = fopen(FILES_PATH . $_GET["active_file"], 'r'); // 'r' mode for read
// Check if the file was opened successfully
if ($file !== false) {
    $profit = (float)0.00;


    if (str_contains($_GET['active_file'], "gegevens") === true) {
        $headers = fgetcsv($file);
        $separator = ",";
//        setlocale(LC_MONETARY, "en_US");
    } else {
        $headers = fgetcsv($file, separator: "\t");
        $separator = "\t";
//        setlocale(LC_MONETARY, "nl_NL");
    }

    print("<head><title>Inkomsten</title><link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet''></head>");
    print("<body class='p-4'>");
    print("
        <div class='width: 50%'>
            <table>
                <tr>
                    <th>$headers[0]</th>
                    <th>$headers[1]</th>
                    <th>$headers[2]</th>
                    <th>$headers[3]</th>
                </tr>
            ");


    while (($data = fgetcsv($file, separator: $separator)) !== false) {
        $date = date_format(date_create($data[0]), 'd-F-Y');
        $numeric_earning = str_replace(["€"], [""], $data[3]);
//        $numeric_earning = number_format($numeric_earning, 2);


        $profit = (float)$profit + (float)$numeric_earning;
        if($numeric_earning > 0) {
            $kleurBepaler = "<td class='text-success'>";
        } else {
            $kleurBepaler = "<td class='text-danger'>";
        }

        print("
                <tr>
                    <td>$date</td>
                    <td>$data[1]</td>
                    <td>$data[2]</td>
                    $kleurBepaler $data[3]</td>
                </tr>
            ");
    }


    print("</table></div>");
    if ($profit > 0){
        print("<h3 class='text-success'>");
    } else {
        print("<h3 class='text-danger'>");
    }
    print("Totale winst: €$profit</h3>");


    print("</body>");

    // Close the file when done
    fclose($file);
} else {
    echo "Error opening the file.";

}




