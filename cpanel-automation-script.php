<?php

echo "Fetching path\n\n";

$target_directory = "public_html";//"myticket.charlesdete.com";
$base_url = "C:\Users\user\Sites\Event tickets project";
$path = getcwd();
$files = glob($path . '/*');

echo "Path preparation completed.\n\n";

try{
$myfile = fopen(".cpanel.yml", "w") or die("Unable to open file!");
echo ".cpanel.yml opened.\n\n";

echo "Writing initial commands.\n\n";

fwrite($myfile, "---\ndeployment:\n\ttasks:\n\t\t- export DEPLOYPATH=/home/charlesd/$target_directory/\n");

echo "Finished writing initial commands.\n\n";

echo "Starting to write file names.\n\n";
foreach($files as $file) {
    if(is_dir($file)){
        // folders
        $line_to_write = "\t\t- /bin/cp -R /home/charlesd/repositories/Ticket-project/" . substr($file, - (strlen($file) - strlen($base_url) - 1)) . " \$DEPLOYPATH\n";
        fwrite($myfile, $line_to_write);
        echo $file . " was written successfully.\n\n";
    }
    else {
        // files
        $line_to_write = "\t\t- /bin/cp /home/charlesd/repositories/Ticket-project/" . substr($file, - (strlen($file) - strlen($base_url) - 1)) . " \$DEPLOYPATH\n";
        fwrite($myfile, $line_to_write);
        echo $file . " was written successfully.\n\n";
    }
}


fclose($myfile);

echo count($files) . " files processed.\n\n";
echo "Script completed successfully.\n\n";

} catch (Exception $e) {
    echo $e . "\n\n";
    echo "An error occurred.\n";
} finally {
    echo "Process complete.\n";
}
