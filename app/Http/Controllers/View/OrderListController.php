<?php

namespace App\Http\Controllers\View;


use App\Http\Controllers\Controller;
use Eshop\Services\OrderListService;
use Illuminate\Http\Request;

class OrderListController extends Controller
{
    /**
     * @var OrderListService
     */
    protected $orderListService;

    /**
     * OrderListController constructor.
     * @param OrderListService $orderListService
     */
    public function __construct ( OrderListService $orderListService )
    {
        $this->orderListService = $orderListService;
    }

    /**
     * @return mixed
     */
    public function index ( Request $request )
    {
        return $this->orderListService->toOrderList ( $request );
    }
}
