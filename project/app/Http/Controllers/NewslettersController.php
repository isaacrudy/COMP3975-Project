<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Symfony\Component\Console\Output\ConsoleOutput;

class NewslettersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Newsletter::latest()->paginate(5);
        // dd($data);
        return view('newsletters.index', ['newsletters' => $data])->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('newsletters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate the input
        $request->validate([
            'Title' => 'required',
            'Content' => 'required',
            'ImageURL' => 'required',
        ]);
        // create a new newsletter
        Newsletter::create($request->all());
        // redirect the user to the newsletters list page and send a friendly message
        return redirect()
            ->route('newsletters.index')
            ->with('success', 'Newsletter created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('newsletters.show', [
            'newsletter' => Newsletter::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('newsletters.edit', [
            'newsletter' => Newsletter::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        // Validation for required fields (and using some regex to validate our numeric value)
        $request->validate([
            'id' => 'required',
            'Title' => 'required',
            'Content' => 'required',
            'ImageURL' => 'required',
        ]);
        $newsletter = Newsletter::find($request->get('id'));
        // this can be used for debugging
        // it displays in the console
        $output = new ConsoleOutput();
        $output->writeln('NEWSLETTER OBJECT: ' . $newsletter);
        // Getting values from the blade template form
        $newsletter->Title = $request->get('Title');
        $newsletter->Content = $request->get('Content');
        $newsletter->ImageURL = $request->get('ImageURL');
        $newsletter->save();
        return redirect()
            ->route('newsletters.index')
            ->with('success', 'Newsletter updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // find the newsletter
        $newsletter = Newsletter::find($id);
        // delete the newsletter
        $newsletter->delete();
        // redirect to newsletters list page
        return redirect()
            ->route('newsletters.index')
            ->with('success', 'Newsletter deleted successfully');
    }
}
