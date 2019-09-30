<?php

interface SeekableIterator extends Iterator {
    public function seek ($position);
    public function current ();
    public function key ();
    public function next ();
    public function rewind ();
    public function valid ();
}