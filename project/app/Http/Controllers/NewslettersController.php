<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Symfony\Component\Console\Output\ConsoleOutput;

class NewslettersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @OA\Get(
     * path="/newsletters",
     * tags={"Newsletters"},
     * summary="Get all newsletters",
     * description="Read all the newsletters in the database",
     * operationId="index",
     * @OA\Response(
     * response=200,
     * description="successful operation"
     * ),
     * @OA\Response(
     * response=400,
     * description="Invalid status value"
     * )
     * )
     */
    public function index()
    {
        $data = Newsletter::latest()->paginate(5);
        // dd($data);
        return view('newsletters.index', ['newsletters' => $data])->with(request()->input('page'));
    }

    /**
     * @OA\Post(
     * path="/newsletters/store",
     * operationId="storeNewsletter",
     * tags={"Newsletters"},
     * summary="Add new newsletter",
     * description="Add newsletter data.",
     * @OA\RequestBody(
     * required=true,
     * @OA\JsonContent(required={"Title", "Content", "ImageURL"})
     * ),
     * @OA\Response(
     * response=201,
     * description="Successful operation",
     * @OA\JsonContent(required={"Title", "Content", "ImageURL"})
     * ),
     * @OA\Response(
     * response=400,
     * description="Bad Request"
     * ),
     * @OA\Response(
     * response=401,
     * description="Unauthenticated",
     * ),
     * @OA\Response(
     * response=403,
     * description="Forbidden"
     * )
     * )
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
     * @OA\Get(
     * path="/newsletters/show/{id}",
     * operationId="getNewsletterById",
     * tags={"Newsletters"},
     * summary="Get newsletter information",
     * description="Returns newsletter data",
     * @OA\Parameter(
     * name="id",
     * description="newsletter id",
     * required=true,
     * in="path",
     * @OA\Schema(
     * type="integer"
     * )
     * ),
     * @OA\Response(
     * response=200,
     * description="Successful operation",
     * ),
     * @OA\Response(
     * response=400,
     * description="Bad Request"
     * ),
     * @OA\Response(
     * response=401,
     * description="Unauthenticated",
     * ),
     * @OA\Response(
     * response=403,
     * description="Forbidden"
     * )
     * )
     */
    public function show($id)
    {
        return view('newsletters.show', [
            'newsletter' => Newsletter::findOrFail($id),
        ]);
    }

    /**
     * @OA\Put(
     * path="/newsletters/update",
     * operationId="updateNewsletter",
     * tags={"Newsletters"},
     * summary="Update existing newsletter",
     * description="Returns updated newsletter data",
     * @OA\Parameter(
     * name="id",
     * description="Newsletter id",
     * required=true,
     * in="path",
     * @OA\Schema(
     * type="integer"
     * )
     * ),
     * @OA\RequestBody(
     * required=true,
     * @OA\JsonContent(required={"Title", "Content", "ImageURL"})
     * ),
     * @OA\Response(
     * response=202,
     * description="Successful operation",
     * @OA\JsonContent(required={"Title", "Content", "ImageURL"})
     * ),
     * @OA\Response(
     * response=400,
     * description="Bad Request"
     * ),
     * @OA\Response(
     * response=401,
     * description="Unauthenticated",
     * ),
     * @OA\Response(
     * response=403,
     * description="Forbidden"
     * ),
     * @OA\Response(
     * response=404,
     * description="Resource Not Found"
     * )
     * )
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
     * @OA\Delete(
     * path="/api/newsletter/{id}",
     * operationId="deleteNewsletter",
     * tags={"Newsletters"},
     * summary="Delete existing newsletter",
     * description="Deletes a record and returns no content",
     * @OA\Parameter(
     * name="id",
     * description="Newsletter id",
     * required=true,
     * in="path",
     * @OA\Schema(
     * type="integer"
     * )
     * ),
     * @OA\Response(
     * response=204,
     * description="Successful operation",
     * @OA\JsonContent()
     * ),
     * @OA\Response(
     * response=401,
     * description="Unauthenticated",
     * ),
     * @OA\Response(
     * response=403,
     * description="Forbidden"
     * ),
     * @OA\Response(
     * response=404,
     * description="Resource Not Found"
     * )
     * )
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('newsletters.create');
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
     * @OA\Get(
     * path="/api/newsletters",
     * tags={"Newsletters"},
     * summary="Get the last five newsletters",
     * description="Get the last five newsletters",
     * operationId="lastFiveNewsletters",
     * @OA\Response(
     * response=200,
     * description="successful operation"
     * ),
     * @OA\Response(
     * response=400,
     * description="Invalid status value"
     * )
     * )
     */
    public function lastFiveNewsletters()
    {
        // Get the 5 latest newsletters. Distinct as joins will cause multiple NewsletterIDs to appear and count for the take query.
        $distinctNewsletters = DB::table('newsletters')
            ->join('articles', 'newsletters.NewsletterID', '=', 'articles.NewsletterID')
            ->select('newsletters.NewsletterID')
            ->orderBy('newsletters.NewsletterID', 'desc')
            ->distinct()
            ->take(5)
            ->get()
            ->toArray();

        $myArray = [];

        for ($i = 0; $i < count($distinctNewsletters); $i++) {
            array_push($myArray, $distinctNewsletters[$i]->NewsletterID);
        }

        return DB::table('newsletters')
            ->join('articles', 'newsletters.NewsletterID', '=', 'articles.NewsletterID')
            ->select('newsletters.NewsletterID', 'newsletters.Title as NewsletterTitle', 'newsletters.Date', 'newsletters.Logo', 'articles.Title as ArticleTitle', 'articles.Description', 'articles.Image', 'articles.ImagePlacement')
            ->whereIn('newsletters.NewsletterID', $myArray)
            ->orderBy('newsletters.NewsletterID', 'desc')
            ->get();
    }
}
