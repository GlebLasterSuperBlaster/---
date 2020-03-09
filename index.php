<?php
$string = "{Пожалуйста,|Просто|Если сможете,} сделайте так, чтобы это {удивительное|крутое|простое|важное|бесполезное";
// преобразую строку в массив символов, чтобы можно было обратиться к отдельно взятому символу
$split = $strArr = preg_split('//u', $string, null, PREG_SPLIT_NO_EMPTY);
// массив всех букв из строки, по 1ой букве
$arr = [];
// думал добавить сюда строки, которые не изменяются
$arr1 = [];

function openString(array $split, $arr, $arr1)
{

    if ($split[0] === "{") {
        return openString(array_slice($split, 1), $arr, $arr1);
    } else if ($split[0] === "}") {
        return openString(array_slice($split, 1), $arr, $arr1);
    } else if ($split[0] === "|") {
        array_push($arr, " ");
        return openString(array_slice($split, 1), $arr, $arr1);
    } else if ($split[0] !== "{" && !empty($split)) {
        array_push($arr, $split[0]);
        return openString(array_slice($split, 1), $arr, $arr1);

    } else {

        return $arr;
    }

}

$test = openString($split, $arr, $arr1);

print_r($test);

