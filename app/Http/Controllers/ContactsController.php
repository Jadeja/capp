<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Contact;
use App\Repositories\ContactsRepository;

class ContactsController extends Controller
{
    /**
     * The task repository instance.
     *
     * @var TaskRepository
     */
    protected $contacts;

    /**
     * Create a new controller instance.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct(ContactsRepository $contacts)
    {
        $this->middleware('auth');

        $this->contacts = $contacts;
    }

    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('contacts.index', [
            'contacts' => $this->contacts->forUser($request->user()),
        ]);
    }

    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',            
            'phone' => 'required|numeric',            
            'dob' => 'required',            
        ]);

        $request->user()->contacts()->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'company' => $request->company,
            'dob' => $request->dob,
        ]);

        return redirect('/contacts');
    }

    /**
     * Destroy the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function destroy(Request $request, Contact $ct)
    {
        $this->authorize('destroy', $ct);

        $ct->delete();

        return redirect('/contacts');
    }
}
