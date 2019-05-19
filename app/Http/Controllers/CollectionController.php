<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Collection;
use App\Book;

class CollectionController extends Controller
{
    /*My collection method plus output to template*/
    public function index()
    {
    	if(auth()->check())
    	{
    		$collection = Collection::where('user_id',auth()->user()->id)->get();

            $array_ids = $collection->toArray();

            $ids = array();

            foreach($array_ids as $values)
                {
                    array_push($ids,$values['book_id']);
                }

            $books = Book::find($ids);

            return view('collection.index', ['books' => $books]);
    	}
    	
    }

    /*Remove book from collection method*/
    public function remove($id)
    {
        if(auth()->check())
        {
            DB::table('collections')->where('book_id',$id)
                                    ->where('user_id',auth()->user()->id)
                                    ->delete();

            return redirect()->back();
        }

        else
        {
            return redirect()->to('/logout');
        }
    }

    /*Add book to collection method*/
    public function add($id)
    {
        if(auth()->check())
        {
            $collection = new Collection;

            $collection->user_id = auth()->user()->id;

            $collection->book_id = $id;

            $collection->save();

            return  redirect()->back();
        }

        else
        {
            return redirect()->to('/logout');
        }
    }
}
