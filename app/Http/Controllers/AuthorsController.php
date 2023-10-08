<?php

namespace App\Http\Controllers;

use App\Clients\CandidateTestingClient;

class AuthorsController extends Controller
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
        return view('authors.authors_list',compact('getAuthorsList'));
    }

    public function viewAuthorBooks($id)
    {
        $viewAuthorBooksEndpoint = "https://candidate-testing.api.royal-apps.io/api/v2/authors/$id";
        $viewAuthorBooks = $this->candidateTestingClient->makeRequest('GET', $viewAuthorBooksEndpoint, $data = []);
        session()->forget('countBooks');
        session()->forget('authorId');
        session()->put('countBooks',count($viewAuthorBooks->books));
        session()->put('authorId',$id);
        return view('authors.view_author_books',compact('viewAuthorBooks'));
    }

    public function deleteAuthor($id){
        $deleteAuthorEndpoint = "https://candidate-testing.api.royal-apps.io/api/v2/authors/$id";
        $this->candidateTestingClient->makeRequest('delete', $deleteAuthorEndpoint, $data = []);
        return redirect()->route('authors-list');
    }

    public function deleteBook($id){
        $deleteBookEndpoint = "https://candidate-testing.api.royal-apps.io/api/v2/books/$id";
        $this->candidateTestingClient->makeRequest('delete', $deleteBookEndpoint, $data = []);
        return redirect()->route('authors-list');
    }

    
}
