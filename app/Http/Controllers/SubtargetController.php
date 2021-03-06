<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Subtarget;
use App\Models\Target;
use App\Models\Topic;
use Illuminate\Http\Request;

class SubtargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $targets = Target::all();
        $subtargets = Subtarget::all();
        $books = Book::all();
        $topics = Topic::all();
        return view('admin.subtargets.all')
            ->with('targets',$targets)
            ->with('books',$books)
            ->with('topics',$topics)
            ->with('subtargets',$subtargets);
    }

    public function GetBook($book_id)
    {
        $grd = Topic::where('book_id', '=', $book_id)->get();
        return json_encode($grd);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Subtarget::create($request->all());
        alert()->success('اطلاعات با موفقیت ثبت شد','متن پیام');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subtarget  $subtarget
     * @return \Illuminate\Http\Response
     */
    public function show(Subtarget $subtarget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subtarget  $subtarget
     * @return \Illuminate\Http\Response
     */
    public function edit(Subtarget $subtarget)
    {
        $targets = Target::all();
        $subtargets = Subtarget::all();
        $books = Book::all();
        $topics = Topic::all();
        return view('admin.subtargets.edit')
            ->with('targets',$targets)
            ->with('books',$books)
            ->with('topics',$topics)
            ->with('subtargets',$subtargets)
            ->with('subtarget',$subtarget);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subtarget  $subtarget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subtarget $subtarget)
    {
        $subtarget->update($request->all());
        alert()->success('اطلاعات با موفقیت ویرایش شد','متن پیام');
        return redirect('/admin/subtargets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subtarget  $subtarget
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subtarget $subtarget)
    {
        $subtarget->delete();
        alert()->success('رکورد با موفقیت حذف شد','متن پیام');
        return back();
    }
}
