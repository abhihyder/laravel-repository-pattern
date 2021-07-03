<?php

use Illuminate\Support\Facades\DB;

function generate_simple_dropdown($table, $column, $where = null, $selected = null)
{
    $string = "select id, " . $column . " as column_name from " . $table;
    if ($where) {
        $string .= " where " . $where;
    }
    $string .= " order by " . $column . " asc";
    $query = DB::select($string);

    $htmlContent = "<option value=''>Select</option>";

    if ($query) {
        foreach ($query as $q) {
            $htmlContent .= "<option value='$q->id'";

            if ($selected && $selected == $q->id) {
                $htmlContent .= "selected";
            }

            $htmlContent .= ">$q->column_name</option>";
        }
    }
    echo $htmlContent;
}


function convertToObject($array)
{
    $object = new stdClass();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $value = convertToObject($value);
        }
        $object->$key = $value;
    }
    return $object;
}

function string_to_array($data)
{
    if (strrchr($data, ",")) { //check if the string contain comma (,)
        $array = explode(",", $data); //Srting to array convert
    } else {
        $array = [$data];
    }

    return $array;
}

function calcutateAge($dob)
{

    $dob = date("Y-m-d", strtotime($dob));

    $dobObject = new DateTime($dob);
    $nowObject = new DateTime();

    $diff = $dobObject->diff($nowObject);

    return $diff->y;
}
