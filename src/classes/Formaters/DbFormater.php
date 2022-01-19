<?php

namespace classes\Formaters;

use interfaces\FormaterInterface;

class DbFormater implements FormaterInterface
{

    public function format($data)
    {
        $formatedData['main'][] = $data['level'];
        $formatedData['main'][] = $data['message'];
        $formatedData['context'] = $data['context'];

        return $formatedData;
    }
}