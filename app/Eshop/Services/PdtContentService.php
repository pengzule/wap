<?php

namespace Eshop\Services;

use Illuminate\Http\Request;

class PdtContentService extends ThriftService
{
    /**
     * @param Request $request
     * @param $product_id
     * @return mixed
     */
    public function toPdtContent ( Request $request , $product_id )
    {
        $member = $request->session ()->get ( 'member' , '' );
        $member = $member != null ? $member->id : '';
        $inParams = $product_id . ',' . $member;
        $result = $this->connect ( __FUNCTION__ , $inParams );
        $result = json_decode ( $result );
        return view ( 'pdt_content' )->with ( 'product' , $result->product )
                                     ->with ( 'pdt_content' , $result->pdt_content )
                                     ->with ( 'pdt_images' , $result->pdt_images )
                                     ->with ( 'count' , $result->count )
                                     ->with ( 'wish' , $result->wish )
                                     ->with ( 'counts' , $result->counts );
    }

}