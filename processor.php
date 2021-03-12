<?PHP
// > Input preprocessor++ . All Rights Reserved Carlson 2021

//? minified edition (not full edition)
function safe_converter($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
