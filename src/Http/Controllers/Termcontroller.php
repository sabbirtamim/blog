<?php

namespace Blog\Http\Controllers;

use Blog\Http\Requests\Term\Create;
use Blog\Http\Requests\Term\Edit;
use Blog\Http\Requests\Term\Index;
use Blog\Http\Requests\Term\Show;
use Blog\Http\Requests\Term\Store;
use Blog\Http\Requests\Term\Update;
use Illuminate\Http\Request;
use Blog\Http\Requests\CreateTermRequest;

use Auth;
use Blog\Term;
class Termcontroller extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Index $request)
    {
        $terms = Term::paginate(10);
        return view('terms.index')->with('data', $terms);
    }

    public function show(Show $request, $slug)
    {
        $data = Term::GetTermBySlug($slug)->get();
        return view('terms.show')->with('data', $data);
    }


    public function create(Create $request)
    {
        $term = Term::all();
        return view('terms.create')->with('term', $term);
    }

    public function store(Store $request)
    {
        $term = new Term;
        $term->fill($request->all());
        $term->parent_id = $request->get('parent_id');

        if ($term->save()) {
            return redirect()->back()->with('response_message', 'Category created succesfully')->with('result', 'alert-success');
        }else{
            return redirect()->back()->with('response_message', 'Something went wrong. Please try again')->with('result', 'alert-danger');
        }
    }

    public function edit(Edit $request, Term $term)
    {
        $terms = Term::all();
        return view('terms.edit')->with('data', $term)->with('terms', $terms);
    }

    public function update(Update $request, Term $term)
    {
        $term->fill($request->all());
        $term->parent_id = $request->get('parent_id');


        if ($term->save()) {
            return redirect()->back()->with('response_message', 'Your data updated succesfully')->with('result', 'alert-success');
        } else {
            return redirect()->back()->with('response_message', 'Not updated')->with('result', 'alert-danger');

        }
    }

    public function destroy(Term $term)
    {
        if ($term->delete()) {
            return redirect()->back()->with('response_message', 'Deleted successfully')->with('result', 'alert-danger');
        } else {
            return redirect()->back()->with('response_message', 'Not Deleted')->with('result', 'alert-danger');
        }


    }
}
