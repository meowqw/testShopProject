<?php

// [] {} ()

class Stack
{
    public array $arr;

    public function __construct(array $arr) {
        $this->arr = $arr;
    }

    public function push(string $value): void
    {
        $this->arr[] = $value;
    }

    public function extract(): ?string
    {
        return array_pop($this->arr);
    }

    public function get(): array
    {
        return $this->arr;
    }
}

function validString(array $charArr): bool
{
    $stack = new Stack([]);
    $status = true;
    foreach ($charArr as $value) {
        if (in_array($value, ['(', '[', '{'])) {
            $stack->push($value);
        } else {
            $stackValue = $stack->extract();
            $status = in_array($stackValue . $value, ['{}', '[]', '()']);
        }
    }

    if (count($stack->get())) {
        return false;
    }

    return $status;
}

$str = '[{}';
var_dump(validString(str_split($str)));
