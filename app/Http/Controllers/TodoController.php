<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoCreateRequest;
use App\Models\Todo;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    //

    public function __construct(){

        $this->middleware('auth');

    }



    public function index(){

        $todos = auth()->user()->todos->sortBy('completed');

        //$todos = Todo::orderBy('completed')->get();
        return view('todos.index',compact('todos'));


    }


    public function create(){

        return view('todos.create');

    }

    public function edit(Todo $todo){


        //$todo = Todo::find($id);
    
        return view('todos.edit',compact('todo'));

    }

    public function complete(Todo $todo){

        $todo->update(['completed'=>true]);
        return redirect()->back()->with('message','Task Marked as Completed');
        



    }


    public function incomplete(Todo $todo){

        $todo->update(['completed'=>false]);
        return redirect()->back()->with('message','Task Marked as Incompleted');
        



    }


    public function destroy(Todo $todo){

        $todo->delete();
        return redirect()->back()->with('message','Task Deleted');

    }



    public function update(TodoCreateRequest $request,Todo $todo){


        //update todo
        $todo->update(['title'=>$request->title]);

        return redirect(route('todo.index'))->with('message','Updated!');
    
       // return view('todos.edit',compact('todo'));

    }






    public function store(TodoCreateRequest $request){
      /*  $rules = [
            'title'=>'required|max:255'
        ];


        $messages = [
            'title.max'=>'Todo title should not be greator than 255 chars'
        ];

        $validator = Validator::make($request->all(),$rules,$messages);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        */

      //  $request->validate([
      //      'title'=>'required|max:255',

      //  ]);


       
        if(!$request->title){
            return redirect()->back()->with('error',"please give title");
        }



        //Todo::create($request->all());

        auth()->user()->todos()->create($request->all());


        return redirect()->back()->with('message','Todo Created Successfully');


    }









}
