<?php

namespace App\Services;

use App\Models\Item;
use App\Jobs\ProcessEmail;

class UserService
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
     * Show homepage for user.
     *
     */
    public function index()
    {
       return view('user');
    }

    /**
     * Save new item
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addItem($request)
    {
        $maxItem = $this->model
           ->where(['user_id' => \Auth::user()->id])
           ->orderBy('created_at', 'desc')
           ->limit(1)
           ->first();

        if (($maxItem && $maxItem->created_at->format('Y-m-d') < date('Y-m-d')) || ! $maxItem) {
            $filePath = null;

            if ($request->file) {
                $file = $request->file;         
                $filecontent = $file->openFile()->fread($file->getSize());  
                $filename = date('YmdHis') . $file->getClientOriginalName();  
                $file->move(public_path() . '/img/', $filename);  
                $filePath = 'img/' . $filename;    
            }

           $this->model->user_id = \Auth::user()->id; 
           $this->model->subject = $request->subject ; 
           $this->model->message = $request->message; 
           $this->model->name = $request->name; 
           $this->model->email = $request->email;  
           $this->model->file = $filePath;    
           $this->model->save();     

           ProcessEmail::dispatch(config('app.admin.email'), 'You have a new message from site...');

           return true;
       } else {
           return false;
       }
    }
}
