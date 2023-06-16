<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Money;
use App\Http\Requests\MoneyRequest;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class MoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.total.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.Total.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = $request->amount;
        $user_id = Auth::user()->id;
        $moneytotal = Money::where('user_id', $user_id)->first();
        $want = Money::where('user_id', $user_id)->where('type',"Want")->first();
        $essential = Money::where('user_id', $user_id)->where('type',"Essential")->first();
        $saving = Money::where('user_id', $user_id)->where('type','Saving')->first();
        $bank = Money::where('user_id', $user_id)->where('type',"Bank")->first();
        if ($moneytotal->amount < $store) {
            return redirect()->back()->with(['moneyerror'=>'You have insufficient money']);
        } elseif ($saving->amount >= $store) {
                $saving -> update(['amount'=> $saving->amount - $store]);
                $bank -> update(['amount'=> $bank->amount + $store]);
        } elseif ($saving->amount + $want->amount >= $store) {
            $want -> update(['amount'=> $saving->amount + $want->amount - $store]);
            $bank -> update(['amount'=> $bank->amount + $store]);
            $saving -> update(['amount'=> 0]);
        } elseif ($saving->amount + $want->amount + $essential->amount >= $store) {
            $essential -> update(['amount'=> $saving->amount + $want->amount +$essential->amount - $store]);
            $bank -> update(['amount'=> $bank->amount + $store]);
            $saving -> update(['amount'=> 0]);
            $want -> update(['amount'=> 0]);
        }
        $moneytotal -> update(['amount'=> $moneytotal->amount - $store]);
        return redirect()->back();
    }

    public function initiate()
    {
        $user_id = Auth::user()->id;
        $want = ['user_id'=>$user_id, 'amount'=>0, 'type'=>'Want'];
        $total = ['user_id'=>$user_id, 'amount'=>0, 'type'=>'Total']; 
        $essential = ['user_id'=>$user_id, 'amount'=>0, 'type'=>'Essential'] ;
        $saving = ['user_id'=>$user_id, 'amount'=>0, 'type'=>'Saving'];
        $bank = ['user_id'=>$user_id, 'amount'=>0, 'type'=>'Bank'];
        
        Money::create($total);  
        Money::create($want);
        Money::create($essential);  
        Money::create($saving);
        Money::create($bank);
        
        return redirect()->route('dashboard');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('pages.total.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {
        
    }
    
    public function update(Request $request, $id)
    {
        if ($id == 1) {
            $total = Money::where('user_id', Auth::user()->id)->first();
            $id = $total->id ;
            
            $total = Money::find($id);
            $total->update(['amount'=> $total->amount + floor($request->amount)]);
            
            $want = Money::find($id+1);
            $want->update(['amount'=> $want->amount + floor($request->amount * 0.3)]);
            
            $essential = Money::find($id+2);
            $essential->update(['amount'=> $essential->amount + floor($request->amount * 0.5)]);
            
            $saving = Money::find($id+3);
            $saving->update(['amount'=> $saving->amount + floor($request->amount * 0.2 )]);

            return redirect()->back();
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
