<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Services\ManagerService;
use App\Services\UserService;
use App\Http\Requests\ItemRequest;

class DashboardController extends Controller
{
    /**
     * The Service instance
     *
     * @var \App\Services\ManagerService, UserService 
     */
    protected $usingService;
    protected $managerService;
    protected $userService;

    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct(ManagerService $managerService, UserService $userService)
    {
        $this->middleware('auth');

        $this->managerService = $managerService;
        $this->userService = $userService;

        $this->middleware(function ($request, $next) {
            $user= Auth::user();

            if ($user && $user->role === 'manager') {
                $this->usingService = $this->managerService;
            }

            if ($user && $user->role === 'user') {
                $this->usingService = $this->userService;
            }

            return $next($request);
        });
    }

    /**
     * Show the application dashboard
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return $this->usingService->index();
    }

    /**
     * Save new item
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addItem(ItemRequest $request)
    {
       $result = $this->usingService->addItem($request); 

       if ($result) {
          return redirect(route('dashboard'))->with('item-ok', 'New item has been created...');
       } else {
          return redirect(route('dashboard'))->with('item-no', "You can't create another item today. You can do it tomorrow...");      
       }
    }

    /**
     * Answered item
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function answeredItem(Request $request)
    {
       $result = $this->usingService->answeredItem($request->id); 

       return redirect(route('dashboard'));
    }  
}
