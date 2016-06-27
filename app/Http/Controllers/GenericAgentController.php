<?php

namespace App\Http\Controllers;

use App\SystemManager\Repositories\GenericAgentRepository;
use App\SystemManager\Services\ThriftService;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\AppResult;
use Log;

class GenericAgentController extends Controller
{
    protected $genericAgentRepository;
    protected $thriftService;
    protected $appResult;

    /**
     * GenericAgentController constructor.
     * @param GenericAgentRepository $genericAgentRepository
     */
    public function __construct(GenericAgentRepository $genericAgentRepository,ThriftService $thriftService,AppResult $appResult)
    {
        $this->genericAgentRepository = $genericAgentRepository;
        $this->thriftService = $thriftService;
        $this->appResult = $appResult;
    }

    public function index()
    {
        $ips = $this->genericAgentRepository->index('127.0.0.1:80');
        $result = $this->thriftService->connect();
        $time = Carbon::now();
        return view('form')->with('ips',$ips)
            ->with('time',$time)
            ->with('result',$result);
    }


    public function subchild(Request $request)
    {
        $result = $this->thriftService->connect();
        $name = $request->input('name','');
        Log::info($name);
        $ips = $this->genericAgentRepository->index($name);
        $time = Carbon::now();

        $this->appResult->status = 0;
        $this->appResult->message= '返回成功';
        $this->appResult->ips = $ips;
        $this->appResult->time = $time;
        $this->appResult->state = $result;

        return   $this->appResult->toJson();
    }
 


}