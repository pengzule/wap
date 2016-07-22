<?php

namespace Eshop\Services;

use Illuminate\Http\Request;
use App\Models\AppResult;

class PdtSortService extends ThriftService
{
    /**
     * @param Request $request
     * @return string
     */
    public function toPdtSort ( Request $request )
    {
        $orderDir = $request->input ( 'orderDir' , '' );
        $name = $request->input ( 'name' , '' );
        $category_id = $request->input ( 'category_id' , '' );
        $keyword = $request->input ( 'keyword' , '' );

        $inParams = [ 'orderDir' => $orderDir ,
                      'name' => $name ,
                      'category_id' => $category_id ,
                      'keyword' => $keyword ];


        $result = $this->connect ( __FUNCTION__ , json_encode ( $inParams ) );
        $result = json_decode ( $result );

        $app_result = new Appresult;
        $app_result->status = 0;
        $app_result->message = '返回成功';
        $app_result->products = $result;
        return $app_result->toJson ();

    }

}