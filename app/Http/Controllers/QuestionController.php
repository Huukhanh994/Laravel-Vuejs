<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskRequestQuestion;
use App\Question;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::latest()->paginate(5);

        return view('questions.index')->with('questions',$questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Question $question)
    {
        return view('questions.create',compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskRequestQuestion $request)
    {
        $request->user()->questions()->create($request->only('title','body'));
        return redirect()->route('question.index')->with('success','Add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $question->increment('views');

        return view('questions.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        if(\Gate::denies('update-question',$question)){
            abort(403,'403');   
        }
        return view('questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AskRequestQuestion $request,Question $question)
    {
        if(\Gate::denies('update-question',$question)){
            abort(403,'403');   
        }
        $question->update($request->only(['title','body']));
        return redirect()->route('question.index')->with('success','Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        if(\Gate::denies('delete-question',$question)){
            abort(403,'403');   
        }
        $question->delete();

        return redirect()->route('question.index')->with('success','Delete successfully');
    }
}
