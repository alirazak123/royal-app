<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients\CandidateTestingClient;

class BooksController extends Controller
{
    private $candidateTestingClient;

    public function __construct(CandidateTestingClient $candidateTestingClient)
    {
        $this->candidateTestingClient = $candidateTestingClient;
    }

    public function index()
    {
        $authorsListEndpoint = 'https://candidate-testing.api.royal-apps.io/api/v2/authors';
        $getAuthorsList = $this->candidateTestingClient->makeRequest('GET', $authorsListEndpoint, $data = []);
        return view('books.create_book',compact('getAuthorsList'));
    }

    public function createBook(Request $request)
    {
        $createBookEndpoint = 'https://candidate-testing.api.royal-apps.io/api/v2/books';
        $data = (object)[
            "author" => (object)[
                'id' => $request->author
            ],
            "title"=> $request->title,
            "release_date"=> $request->release_date,
            "description"=> $request->description,
            "isbn"=> $request->isbn,
            "format"=> $request->format,
            "number_of_pages"=> (int)$request->number_of_pages

        ];
        $this->candidateTestingClient->makeRequest('POST', $createBookEndpoint, $data);
        return redirect()->route('show-book');
    }
    
}
