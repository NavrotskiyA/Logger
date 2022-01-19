<?php

namespace classes\Formaters;

use interfaces\FormaterInterface;

class TxtFormater implements FormaterInterface
{
    public function format($data)
    {
        $formatedData[] = date('d-m-y H:i:s');
        $formatedData[] = $data['level'];
        $formatedData[] = "Message: ".$data['message'];
        $imploded = 'Context: ';
        foreach ($data['context'] as $val){
            if(is_string($val) || (is_object($val) && method_exists($val,'__toString'))){
                $imploded .= $val;
                $imploded .= ' | ';
            }
        }
        $formatedData[] = $imploded."\n";

        return implode(' ',$formatedData);
    }
}