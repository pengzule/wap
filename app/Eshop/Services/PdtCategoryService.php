<?php

namespace Eshop\Services;


class PdtCategoryService extends ThriftService
{
    /**
     * @param $category_id
     * @return mixed
     */
    public function toPdtCategory ( $category_id )
    {
        $inParams = $category_id;
        $result = $this->connect ( __FUNCTION__ , $inParams );
        $result = json_decode ( $result );

        return view ( 'product' )->with ( 'products' , $result )
                                 ->with ( 'category_id' , $category_id );
    }

}