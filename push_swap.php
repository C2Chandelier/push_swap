<?php

class push_swap
{
    public $la;
    public $lb;

    public function __construct()
    {
        global $argv;
        array_shift($argv);
        $this->la = $argv;
        $this->lb = [];
    }

    public function sa()
    {
        if (count($this->la) > 1) {
            $index0 = $this->la[0];
            $index1 = $this->la[1];

            $this->la[0] = $index1;
            $this->la[1] = $index0;
        } else {
            return;
        }
    }

    public function sb()
    {
        if (count($this->lb) > 1) {
            $index0 = $this->lb[0];
            $index1 = $this->lb[1];

            $this->lb[0] = $index1;
            $this->lb[1] = $index0;
        } else {
            return;
        }
    }

    public function sc()
    {
        $this->sa();
        $this->sb();
    }

    public function pa()
    {
        if (count($this->lb) > 0) {
            $index0 = $this->lb[0];
            array_unshift($this->la, $index0);
        } else {
            return;
        }
    }

    public function pb()
    {
        if (count($this->la) > 0) {
            $index0 = $this->la[0];
            array_unshift($this->lb, $index0);
        } else {
            return;
        }
    }

    public function ra()
    {
        if (count($this->la) > 1) {
            $index0 = $this->la[0];
            array_push($this->la, $index0);
            array_shift($this->la);
        } else {
            return;
        }
    }

    public function rb()
    {
        if (count($this->lb) > 1) {
            $index0 = $this->lb[0];
            array_push($this->lb, $index0);
            array_shift($this->lb);
        } else {
            return;
        }
    }

    public function rc()
    {
        $this->ra();
        $this->rb();
    }

    public function rra()
    {
        if (count($this->la) > 1) {
            $last = count($this->la) - 1;
            array_unshift($this->la, $this->la[$last]);
            array_pop($this->la);
        } else {
            return;
        }
    }

    public function rrb()
    {
        if (count($this->lb) > 1) {
            $last = count($this->lb) - 1;
            array_unshift($this->lb, $this->lb[$last]);
            array_pop($this->lb);
        } else {
            return;
        }
    }

    public function rrc()
    {
        $this->rra();
        $this->rrb();
    }

    public function vardu(){
        var_dump($this->la);
        //var_dump($this->lb);
    }
}

$test = new push_swap();
$test->rra();
$test->vardu();
