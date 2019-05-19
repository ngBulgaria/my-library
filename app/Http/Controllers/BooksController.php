<?php
/*
Books Controller for all books and single book methods:
List all / List my books / Show Single / Create / Edit / Delete
*/
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Book;
use App\Collection;
 
class BooksController extends Controller
{
    /*All books list*/
    public function index()
    {
        $books = Book::all();

        return view('books.index', ['books' => $books]);
    }
    
    /*Singel book method with template*/
    public function show($id)
    {
        if(auth()->check())
        {
            $collection = Collection::where('book_id',$id)
                                    ->where('user_id' ,auth()->user()->id)->get();

            $incollection=false;

            if(!$collection->isEmpty())$incollection=true;
        }

        else
        {
            $incollection=false;
        }

        $book = Book::find($id);

        return view('books.show')->with(['book'=> $book])
                                ->with('incollection',$incollection);
    }

    public function mybooks()
    {
        if(auth()->check())
        {
            $books = Book::where('user_id',auth()->user()->id)->get();

            return view('books.index')->with(['books' => $books]);
        }

        else
        {
            return redirect()->to('/login');
        }

    }
    /*Create new book*/
    public function store()
    {

        if(auth()->check())
        {
            request()->validate([
                'name' => 'required',
                'isbn' => 'required|unique:books',
                'year' => 'required|digits:4|integer',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);
            
            $book = new Book;

            $book->name = request('name');

            $book->isbn = request('isbn');

            $book->year = request('year');

            $book->description = request('description');

            $book->cover_image = request()->file('image')->store('public/images');

            $book->user_id = auth()->user()->id;

            $book->save();

            return redirect()->to('/mybooks');
        }

        else
        {
            return redirect()->to('/login');
        }

    }

    /*Delete a book and all collection relations*/
    public function delete($id)
    {
        $book = Book::find($id);

        if($book->user_id==auth()->user()->id)
        {
            $book->delete();

            DB::table('collections')->where('book_id',$id)->delete();

            return redirect()->to('/mybooks');
        }

        else
        {
            return redirect()->to('/login');
        }
    }

    /*Edit book template*/
    public function edit($id)
    {
        if(auth()->check())
        {
            $book = Book::find($id);

            return view('books.edit', ['book' => $book]);  
        } 

        else
        {
            return redirect()->to('/login');
        }
    }

    /*Edit book method - save edit*/
    public function save($id)
    {

        if(auth()->check())
        {
            request()->validate([
                'name' => 'required',
                'isbn' => 'required',
                'year' => 'required|digits:4|integer',
                'description' => 'required',
            ]);
            
            $book = Book::find($id);

            if($book->user_id == auth()->user()->id)
            {

            $book->name = request('name');

            $book->isbn = request('isbn');

            $book->year = request('year');

            $book->description = request('description');

            if(!empty(request()->file('image')))
                {
                    $book->cover_image = request()->file('image')->store('public/images');
                }
            $book->user_id = auth()->user()->id;

            $book->save();

            return redirect()->to('/editbook/'.$id);
            }

            else
            {
               return redirect()->to('/login');
            }
        }
        else
        {
            return redirect()->to('/login');
        }
    }
}