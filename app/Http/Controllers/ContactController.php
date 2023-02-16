<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
  /**
   * Show contact paqge
   */
  public function show()
  {
    return view('contact');
  }


  /*
   * Send email
   */
  public function sendEmail(Request $request)
  {
    $request->validate([
      'name' => ['required', 'string'],
      'email' => ['required', 'email'],
      'tel' => ['numeric']
    ]);

    $data = array(
      'name' => $request->name,
      'email' => $request->email,
      'tel' => $request->tel
    );

    Mail::to('contact@los-santos.com')->send(new ContactEmail($data));

    return redirect()->route('contact');
  }
}
