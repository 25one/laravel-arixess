<?php

namespace App\Services;

use App\Models\Item;

class ManagerService
{
    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Create a new UserService instance.
     *
     * @param  \App\Models\Item $item
     */
    public function __construct(Item $item)
    {
        $this->model = $item;      
    }

    /**
     * Show homepage for manager.
     *
     */
    public function index()
    {
       $items = $this->model->paginate(2); 
       $links = $items->links('pagination');

       return view('manager', compact('items', 'links'));
    }

    /**
     * Update answered item.
     *
     */
    public function answeredItem($id)
    {
       $item = $this->model->find($id); 
       $item->answered = true;
       $item->save();
    }
}
