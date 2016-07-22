<?php

namespace Eshop\Services;

use Illuminate\Http\Request;
use App\Models\AppResult;

class PdtDetailService extends ThriftService
{
    /**
     * @param Request $request
     * @return string
     */
    public function toPdtDetail ( Request $request )
    {
        $app_result = new Appresult;
        $name = $request->input ( 'name' , '' );
        $product_id = $request->input ( 'product_id' , '' );

        $inParams = [ 'name' => $name ,
            'product_id' => $product_id ];

        $result = $this->connect ( __FUNCTION__ , json_encode ( $inParams ) );
        if ( $name == 'comment' ) {
            $result = json_decode ( $result );
            $app_result->status = 2;
            $app_result->message = '返回成功';
            $app_result->results = $result;
            return $app_result->toJson ();
        }
        $app_result->status = 1;
        $app_result->message = '返回成功';
        $app_result->results = $result;
        return $app_result->toJson ();

    }

}