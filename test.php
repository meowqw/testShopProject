<?php

$arr = [10, 1, 1, 4, 6, 2, 4, 1];

function sum(array $arr)
{
    if (count($arr) >= 1) {
        $num = array_shift($arr);
        echo $num;
        return $num + sum($arr);
    } else {
        return 0;
    }
}

function countElements(array $arr)
{
    if (count($arr) == 0) {
        return 0;
    } else {
        array_shift($arr);
        return countElements($arr) + 1;
    }
}


function maxNum(array $arr)
{
    if (count($arr) == 2) {
        return $arr[0] > $arr[1] ? $arr[0] : $arr[1];
    } else {
        $num = array_shift($arr);
        $sub_num = maxNum($arr);

        return $num > $sub_num ? $num : $sub_num;
    }
}

function binarySearchReq(array $arr, int $searchNum)
{
    if (count($arr) == 1 && $arr[0] == $searchNum) {
        return $arr[0];
    } else {
        binarySearch($arr, $searchNum);
    }
}

$sortedArr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

function binarySearch(array $arr, int $item)
{
    $low = 0;
    $high = count($arr) - 1;
    $repetition = 0;

    while ($low <= $high) {
        $repetition++;
        echo $repetition;
        $mid = ceil(($low + $high) / 2);
        $guess = $arr[$mid];
        if ($guess == $item) {
            return $mid;
        }
        if ($guess > $item) {
            $high = $mid - 1;
        } else {
            $low = $mid + 1;
        }
    }
    return null;
}


function findMin($arr): int
{
    $minValue = $arr[0];
    $minIndex = 0;
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] < $minValue) {
            $minValue = $arr[$i];
            $minIndex = $i;
        }
    }
    return $minIndex;
}

function selectionSort($arr): array
{
    $resArr = [];
    $arrCount = count($arr);
    for ($i = 0; $i < $arrCount; $i++) {
        $minIndex = findMin($arr);
        $resArr[] = $arr[$minIndex];
        array_splice($arr, $minIndex, 1);
    }
    return $resArr;
}

$arr2 = [1, 5, 6, 2, 5, 4, 3, 10];

//var_dump(selectionSort($arr2));

function fact(int $x)
{
    if ($x == 1) {
        return 1;
    } else {
        return $x * fact($x - 1);
    }
}

function qSort(array $arr): array
{
    if (count($arr) <= 1) return $arr;

    $pivot = rand(0, count($arr) - 1);

    $left = $right = array();

    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] < $pivot) {
            $left[] = $arr[$i];
        } else {
            $right[] = $arr[$i];
        }
    }

    return array_merge(qSort($left), array($pivot), qSort($right));
}

//var_dump(qSort($arr2));


$dict = ['a' => 1, 'b' => 2];
$dict[3] = 5;
echo key_exists('3', $dict);
