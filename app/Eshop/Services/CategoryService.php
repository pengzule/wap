<?php

namespace Eshop\Services;


class CategoryService extends ThriftService
{
    /**
     * @return $this
     */
    public function toCategory ()
    {
        $inParams = '';
        $result = $this->connect ( __FUNCTION__ , $inParams );
        $result = json_decode ( $result );
        return view('category')->with('categorys', $result);
    }

}