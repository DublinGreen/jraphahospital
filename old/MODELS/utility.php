<?php

# This will contain actions that i wll perform often within the application
# Script by Green
# contact greendublin007@gmail.com for help

function __spl_autoload_register($class_name) {
    $class_name = strtolower($class_name);
    $path1 = "{$class_name}.php";
    $path2 = "../{$class_name}.php";
    $path3 = "../../{$class_name}.php";
    $path4 = "MODELS/{$class_name}.php";
    $path4 = "CONTROLLERS/{$class_name}.php";
    $path5 = "VIEWS/{$class_name}.php";

    if (file_exists($path)) {
        require_once "$path";
    } else if (file_exists($path2)) {
        require_once "$path2";
    } else if (file_exists($path3)) {
        require_once "$path3";
    } else if (file_exists($path4)) {
        require_once "$path4";
    } else if (file_exists($path5)) {
        require_once "$path5";
    } else {
        die("The file {$class_name} could not be found.");
    }
}

class Utility {

    public static function redirectPage($page) {
        if (isset($page)) {
            header("Location: $page");
            exit();
        } else {
            die("There was an error in the application. (code 404 error)");
        }
    }

    public static function police($redirectPage) {
        if (!isset($_SESSION['userId']) && isset($redirectPage)) {
            self::redirectPage($redirectPage);
        }
    }

    public static function visitorPass($redirectPage) {
        if (isset($_SESSION['userId'])) {
            self::redirectPage($redirectPage);
        }
    }

    public static function tokenGenerator() {
        return md5(rand(11, 1000000000));
    }

    public static function randNumber($min = 10, $max = 1000000) {
        return rand($min, $max);
    }

    public static function roundNumber($val, $precisioin) {
        return round($val, $precision);
    }

    public static function maxVal($array) {
        return max($values);
    }

    public static function minVal($array) {
        return min($values);
    }

    public static function arrayJoiner($glue, $pieces) {
        return implode($glue, $pieces);
    }

    public static function arraySeperator($delimiter, $string) {
        return explode($delimiter, $string);
    }

    public static function checkClass($class_name) {
        if (!class_exists($class_name)) {
            exit($class_name . " class doesn't exist.");
        }
    }

    public static function checkMethod($class_name, $method_name) {
        if (!method_exists($class_name, $method_name)) {
            exit($method_name . " method doesn't exist in class " . $object);
        }
    }

    public static function getClassMethod($class_name) {
        return $methods = get_class_methods($class_name);
    }

    public static function getClass($var) {
        return get_class($var);
    }

    public static function varConfirmClass($var, $class_name) {
        if (!is_a($var, $class_name)) {
            exit($var . " is not a " . $class_name . " class .");
        }
    }

    public static function getClassVars($class_name) {
        return get_class_vars($class_name);
    }

    public static function checkFormValues($value, $formValue) {
        if (!empty($value)) {
            return $value;
        } else {
            exit("{$formValue} is empty");
        }
    }

    public static function hashpassword($password) {
        if (isset($password) && !empty($password)) {
            if (CRYPT_BLOWFISH == 1) {
                $hashedpassword = crypt($password, '$2a$07$salt$');
            }
            return $hashedpassword;
        } else {
            exit("Unable to perform password hashing");
        }
    }

    public static function linkHelper($page,$active = "class='alert-info' ") {
        $link = $_SERVER['PHP_SELF'];
        if (strstr($link, "$page")) {
            $activeLink = $active;
            echo($activeLink);
        }
    }
}

?>
