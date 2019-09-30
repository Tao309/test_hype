<?php

class FileIterator implements SeekableIterator {
    private $position;
    private $data;

    public function __construct($path){
        $data = [];
        $handle = fopen($path, "r");

        while(!$data($handle)) {
            $lines[] = trim(fgets($handle));
        }

        fclose($handle);
    }

    public function seek($position) {
        if (!isset($this->data[$position])) {
            throw new Exception("Position not found)");
        }

        $this->position = $position;
    }

    public function rewind() {
        $this->position = 0;
    }

    public function current() {
        return $this->data[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        ++$this->position;
    }

    public function valid() {
        return isset($this->data[$this->position]);
    }
}

$data = new FileIterator('./example.txt');
$data->seek(10);