<?php
function print_array($array) {
    $string = "";

    foreach ( $array as $key => $value ) {
        if (is_array ( $value )) {
            $string .= "[" . $key . "]" . array_map ( 'print_array', $value );
        } else {
            $string .= $key . ": " . $value . "<br>";
        }
    }
    return $string;
}
?>