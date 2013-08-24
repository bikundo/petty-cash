<?php

class TransactionsController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
     public $layout='master';
    public function index()
    {   $user=Sentry::getUser();
        $transactions=DB::table('transactions')
            ->where('user_id', '=', $user['id'])
            ->get();
            
         $this->layout->content = View::make('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {  
       
        $this->layout->content = View::make('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
        $rules = array('receipt_number' => array('required', 'min:1'),
                        'reason' => array('required'),
                        'amount' => array('required')

                        );

    $validator = Validator::make(Input::all(), $rules);
    $Input=Input::all();
    if ($validator->fails())
    {  
        return Redirect::to('transactions/create')->withInput()->withErrors($validator);
    }
           $transact = [
            "department" => $Input['department'],
            "amount" => $Input['amount'],
            "receipt_number" => $Input['receipt_number'],
            "reason" => $Input['reason'],
            "authorised" => "2",
            "comment" => "pending",
            "user_id" => $Input['user_id'],
                    ];
            transaction::create($transact);
            return Redirect::route('transactions.index');
    }

    /**
     * Display the specified resource.
     *$array = [
  * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $transaction = Transaction::find($id);
        $this->layout->content = View::make('transactions.show', compact('transaction'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $transaction = Transaction::find($id);
        $this->layout->content = View::make('transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {   
        $Input=Input::all();
        $transact = [
            "authorised" => $Input['authorised'],
            "comment" => $Input['comment'], ]; 
        DB::table('Transactions')
            ->where('id', $id)
            ->update($transact);
        return Redirect::to('display');

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