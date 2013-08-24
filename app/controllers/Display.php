<?php

class Display extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public $layout='master';
    public function index()
    {   $user=Sentry::getUser();
        if (!$user->isSuperUser())
    {
        return Redirect::to('/');
    }
    else
    {
        $all=Transaction::with('User')->orderBy('created_at', 'DESC')->paginate(10);
        $this->layout->content = View::make('transactions.all', compact('all'));
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}