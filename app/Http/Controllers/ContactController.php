<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $contacts = Contact::where('user_id',$userId)->get();
        return view('contact.index',compact('contacts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name'=> ['required', 'min:3', 'unique:contacts'],
            'number' =>['required', 'min:3','unique:contacts'],
            'user_id' => 'required',
        ]);

        $data = $request->all();

        Contact::create([
            'name' => $data['name'],
            'number'=> $data['number'],
            'user_id' => $data['user_id']
        ]);

        return redirect()->route('contact.index')->with('message','successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = Contact::find($id);
        return view('contact.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'=>'required',
            'number' => 'required',
            'user_id'=> 'required'
        ]);
        $data = $request->all();
        $enteredName = $data['name'];
        $enteredNumber = $data['number'];
        // get the single contact from database 
        $contact = Contact::find($id);

        if($contact->name == $enteredName || $contact->number == $enteredNumber)
        {
            return redirect()->route('contact.index');
        }

        $contact->name = $enteredName;
        $contact->number = $enteredNumber;
        $contact->user_id = $data['user_id'];
        $contact->save();

        return redirect()->route('contact.index')->with('message','contact updated!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
