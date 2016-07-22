<?php

namespace Eshop\Services;

use Illuminate\Http\Request;

class OrderListService extends ThriftService
{
    public function toOrderList ( Request $request )
    {

        $member = $request->session ()->get ( 'member' , '' );
        $name = $request->input('name','');

        $inParams =['member_id'=>$member->id,
                    'name'=>$name];
        $result = $this->connect ( __FUNCTION__ , json_encode($inParams) );
        $result = json_decode ( $result );

        if($name == 'topay'){
            $orders = Order::where('member_id', $member->id)->where('status',1)->orderby('created_at','desc')->get();
        }else if($name == 'tosend'){
            $orders = Order::where('member_id', $member->id)->where('status',3)->orderby('created_at','desc')->get();
        }else if($name == 'torecv'){
            $orders = Order::where('member_id', $member->id)->where('status',4)->orderby('created_at','desc')->get();
        }else if($name == 'todone'){
            $orders = Order::where('member_id', $member->id)->where('status',5)->orderby('created_at','desc')->get();
        } else{
            $orders = Order::where('member_id', $member->id)->orderby('created_at','desc')->get();
        }
        foreach ($orders as $order) {
            $order_items = OrderItem::where('order_id', $order->id)->get();
            $order->order_items = $order_items;
            foreach ($order_items as $order_item) {
                $order_item->product = json_decode($order_item->pdt_snapshot);
            }
        }

        return view('userorder')->with('orders', $result)
            ->with('member_id',$member->id)
            ->with('name',$name);









        return view('personal')->with('member',$result->member)
            ->with('order1',$result->order1)
            ->with('order2',$result->order2)
            ->with('order3',$result->order3)
            ->with('order4',$result->order4)
            ->with('comments',$result->comments)
            ->with('wishes',$result->wishes);

    }
}