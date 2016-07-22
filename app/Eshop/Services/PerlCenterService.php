<?php

namespace Eshop\Services;

use Illuminate\Http\Request;


class PerlCenterService extends ThriftService
{
    public function toPerlCenter ( Request $request )
    {
        $member = $request->session ()->get ( 'member' , '' );

        $inParams = $member->id;
        $result = $this->connect ( __FUNCTION__ , $inParams );
        $result = json_decode ( $result );

        return view('personal')->with('member',$result->member)
            ->with('order1',$result->order1)
            ->with('order2',$result->order2)
            ->with('order3',$result->order3)
            ->with('order4',$result->order4)
            ->with('comments',$result->comments)
            ->with('wishes',$result->wishes);

    }
}