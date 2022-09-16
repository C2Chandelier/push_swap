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
            echo "sa";
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
            echo "sb";
        } else {
            return;
        }
    }

    public function sc()
    {
        $this->sa();
        $this->sb();
        echo "sc";
    }

    public function pa()
    {
        if (count($this->lb) > 0) {
            $index0 = $this->lb[0];
            array_unshift($this->la, $index0);
            array_shift($this->lb);
            echo "pa";
        } else {
            return;
        }
    }

    public function pb()
    {
        if (count($this->la) > 0) {
            $index0 = $this->la[0];
            array_unshift($this->lb, $index0);
            array_shift($this->la);
            echo "pb";
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
            echo "ra";
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
            echo "rb";
        } else {
            return;
        }
    }

    public function rr()
    {
        $this->ra();
        $this->rb();
        echo "rr";
    }

    public function rra()
    {
        if (count($this->la) > 1) {
            $last = count($this->la) - 1;
            array_unshift($this->la, $this->la[$last]);
            array_pop($this->la);
            echo "rra";
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
            echo "rrb";
        } else {
            return;
        }
    }

    public function rrr()
    {
        $this->rra();
        $this->rrb();
        echo "rrr";
    }

    public function tri()
    {
        if (count($this->la) > 1) {

            while (!empty($this->la)) {
                /* echo "la : " . implode(" ",$this->la) . PHP_EOL;
                echo "lb : " . implode(" ",$this->lb) . PHP_EOL; */
                $min = min($this->la);

                if (isset($this->la[1]) && $this->la[1] < $this->la[0]) {
                    $this->sa();
                    echo " ";
                }

                $i = 0;
                $result = "";
                while ($i < count($this->la) - 1) {
                    if ($this->la[$i] <= $this->la[$i + 1]) {
                        $i++;
                    } else {
                        $result = "faux";
                        $i++;
                    }
                }

                if ($result == "") {
                    if (!empty($this->lb)) {
                        $this->pa();
                        if(count($this->lb) > 0){
                            echo " ";
                        }
                    } else {
                        return;
                    }
                } else {
                    if ($min != $this->la[0]) {
                        $this->rra();
                        echo " ";
                    } else {
                        $this->pb();
                        echo " ";
                    }
                }
            }
        } else{
            return;
        }
    }
}

$test = new push_swap();
$test->tri();

