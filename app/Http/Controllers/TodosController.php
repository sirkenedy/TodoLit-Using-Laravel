<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Todo;

class TodosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$todos = Todo::all();
        $user_id = auth()->user()->id;
        $todos = Todo::where('user_id',$user_id)->orderBy('created_at', 'desc')->get();
        // $user = User::find($user_id);
        // var_dump($todos);
        // $todos = Todo::orderBy('created_at', 'desc')->get();
        return view('todos.index')->with('todos', $todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos..create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'text' => 'required',
            'user_id' => 'required',

        ]);
        //create Todo
        $todo = new Todo;
        $todo->text = $request->input('text');
        $todo->body = $request->input('body');
        $todo->due = $request->input('due');
        $todo->user_id = $request->input('user_id');

        $todo->save();

        return redirect('/')->with('success', 'Todo Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $userTodo = Todo::fetchTodoBaseOnUser($id);
         if(!$userTodo) {
             return view('error.404');
           }
          return view('todos.show')->with('todo', $userTodo);         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userTodo = Todo::fetchTodoBaseOnUser($id);
        if(!$userTodo) {
            return view('error.404');
        }
        return view('todos.edit')->with('todo', $userTodo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);

        $todo->text = $request->input('text');
        $todo->body = $request->input('body');
        $todo->due = $request->input('due');

        $todo->save();

        return redirect('/')->with('success', 'Todo Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return redirect('/')->with('success', 'Todo Deleted');
    }
}
