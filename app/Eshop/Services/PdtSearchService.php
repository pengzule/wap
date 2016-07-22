<?php

namespace Eshop\Services;

use Illuminate\Http\Request;

class PdtSearchService extends ThriftService
{

    /**
     * @param Request $request
     * @return mixed
     */
    public function toPdtSearch ( Request $request )
    {
        $category = '';
        $keyword = $request->input ( 'keyword' , '' );
        $inParams = $keyword;
        $result = $this->connect ( __FUNCTION__ , $inParams );
        $result = json_decode ( $result );
        return view ( 'product' )->with ( 'products' , $result )
                                 ->with ( 'category_id' , $category )
                                 ->with ( 'keyword' , $keyword );
    }

}