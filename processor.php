<?PHP
// ** Input preprocessor++ . All Rights Reserved Carlson 2021

//Completed functions that can be imported to speed up checking.
//Some fucntions ,ay be reused to recheck data

// * converter to verify data is polished

function safe_converter($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// * Email validator
// ! API is not 100% relieable due to not checking dns records.
// returns an array where element 0 is a bool and 1 is the output.
function emailValidator($rawemail)
{
    $safe_email = safe_converter($rawemail);
    if (empty($safe_email)) {
        $err =  "Email is required";
    } else {
        // check if e-mail address is well-formed
        if (!filter_var($safe_email, FILTER_VALIDATE_EMAIL)) {
            $err =  "Invalid email format";
        }
    }
    if (empty($err)) {
        return array(true, $safe_email);
    } else {
        return array(false, $err);
    }
}

// * URL validator
// ? Should be safe to use
function URLvalidator($rawurl)
{
    $safe_url = safe_converter($rawurl);
    if (empty($safe_url)) {
        return array(false, "URL is empty");
    }
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $safe_url)) {
        return array(false, "Invalid URL");
    } else {
        return array(true, $safe_url);
    }
}

// * Name validator
// ? Only allows whitespace and letters, nothing else
function nameValidator($rawname)
{
    $safename = safe_converter($rawname);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $safename)) {
        return array(false,"Only letters and white space allowed");
    } else {
        return array(true, $safename);
    }
}

// *UUIDv4 generator from stackoverflow
// ? Very complex, use for extreme scenarios
function gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}

// *Simple uuid generator
// ! Might have issues if used alot of times as entropy is not high enough
function genUidsimple(){
    $uuid = "";
    $uuid =  uniqid("", true);
    return $uuid;
}

