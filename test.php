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


/**
 * Поиск в ширину (6 глава)
 */
class Queue
{
    public array $arr = [];

    /**
     *  Добавить в очередь
     *
     * @param array $element
     * @return void
     */
    public function push(array $element): void
    {
        $this->arr = array_merge($this->arr, $element);
    }

    /**
     * Получить елемент из очереди
     *
     * @return mixed|null
     */
    public function get(): mixed
    {
        return array_shift($this->arr);
    }

    /**
     * Получить размер массива
     *
     * @return int
     */
    public function getLength(): int
    {
        return count($this->arr);
    }
}

$graph = [];
$graph['you'] = ['alice', 'bob', 'claire'];
$graph['bob'] = ['anuj', 'peggy'];
$graph['alice'] = ['peggy'];
$graph['claire'] = ['thommmm', 'jonny'];
$graph['anuj'] = [];
$graph['peggy'] = [];
$graph['thommmm'] = [];
$graph['jonny'] = [];

function search($name): string|bool
{
    global $graph;
    $searchQueue = new Queue();
    $searchQueue->push($graph[$name]);
    $searched = [];
    while ($searchQueue->getLength()) {
        $person = $searchQueue->get();
        if (in_array($person, $searched)) {
            continue;
        }

        if (personIsSeller($person)) {
            return $person;
        } else {
            $searchQueue->push($graph[$person]);
            $searched[] = $person;
        }
    }
    return false;
}

function personIsSeller(string $person): bool
{
    return strlen($person) > 6;
}

//echo search('you');

// 7 глава (алгоритм Дейкстры)

// граф
$graphD = [];
$graphD['start'] = [];
$graphD['start']['a'] = 6;
$graphD['start']['b'] = 2;
$graphD['a'] = [];
$graphD['a']['fin'] = 1;
$graphD['b'] = [];
$graphD['b']['a'] = 3;
$graphD['b']['fin'] = 5;
$graphD['fin'] = [];
// стоимости
$infinity = 1000000;
$costs = [];
$costs['a'] = 6;
$costs['b'] = 2;
$costs['fin'] = $infinity;
// родители
$parents = [];
$parents['a'] = 'start';
$parents['b'] = 'start';
$parents['fin'] = null;
// отработанные
$processed = [];

function findLowestCostNode($costs): int|string|null
{
    global $infinity, $processed;
    $lowestCost = $infinity;
    $lowestCostNode = null;
    foreach ($costs as $key => $value) {
        $cost = $value;
        if ($cost < $lowestCost && !in_array($key, $processed)) {
            $lowestCost = $cost;
            $lowestCostNode = $key;
        }
    }
    return $lowestCostNode;
}

function dijkstraSearch(): void
{
    global $costs, $parents, $processed, $graphD;
    $node = findLowestCostNode($costs);
    while (!is_null($node)) {
        $cost = $costs[$node];
        $neighbours = $graphD[$node];
        foreach ($neighbours as $key => $value) {
            $newCost = $cost + $value;

            if ($costs[$key] > $newCost) {
                $costs[$key] = $newCost;
                $parents[$key] = $node;
            }
        }

        $processed[] = $node;
        $node = findLowestCostNode($costs);
    }
}

function wayScore($parents, $costs): void
{

    foreach ($parents as $key => $value) {
        echo $value . '->' . $key . '-' . $costs[$key] . "\n";
    }
}

dijkstraSearch();
//wayScore($parents, $costs);

// глава 8

class Set
{
    public array $set;

    public function __construct(array $arr)
    {
        $this->set = array_unique($arr);
    }

    public function push($value): void
    {
        if (!in_array($value, $this->set)) {
            $this->set[] = $value;
        }
    }

    public function getSet(): array
    {
        return $this->set;
    }

    /**
     * Получить размер массива
     *
     * @return int
     */
    public function getLength(): int
    {
        return count($this->set);
    }

    public static function unionSet(Set $oneSet, Set $secondSet): self
    {
        return new Set(array_merge($oneSet->getSet(), $secondSet->getSet()));
    }

    public static function diffSet(Set $oneSet, Set $secondSet): self
    {
        $newSet = new Set([]);
        foreach ($secondSet as $value) {
            if (!in_array($value, $oneSet->getSet())) {
                $newSet->push($value);
            }
        }
        return $newSet;
    }
}

$statesNeeded = new Set(["mt", "wa", "or", "id", "nv", "ut", "са", "az"]);
$stations = [];
$stations['kone'] = new Set(['id', 'nv', 'ut']);
$stations['ktwo'] = new Set(['wa', 'id', 'my']);
$stations['kthree'] = new Set(['or', 'nv', 'ca']);
$stations['kfour'] = new Set(['nv', 'ut']);
$stations['kfive'] = new Set(['ca', 'az']);
$finalStation = new Set([]);

function stationsSearch($statesNeeded) {
    global $stations, $finalStation;
    while ($statesNeeded->getLength() > 0) {
        $bestStation = null;
        $stationCovered = new Set([]);
        foreach ($stations as $key => $value) {
            $covered = Set::unionSet($statesNeeded, $value);
            var_dump($covered->getLength());
            if ($covered->getLength() > $stationCovered->getLength()) {
                $bestStation = $key;
                $stationCovered = $covered;
            }
        }

        $statesNeeded = Set::diffSet($statesNeeded, $stationCovered);
        $finalStation->push($bestStation);
    }

    return $finalStation;
}
//stationsSearch($statesNeeded);
