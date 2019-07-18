<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submission;

use App\User;

use Vinkla\Hashids\Facades\Hashids;

use App\Mail\NewSubmission;

class SubmissionController extends Controller
{
  public function index($recipienthash) {
    if(!is_numeric (Hashids::decode($recipienthash)[0])) {
      abort(404);
    }
    $recipient_id = Hashids::decode($recipienthash)[0];
    $submissions = Submission::where('user_id',$recipient_id)->simplePaginate(5);
    return view('submissions', compact('submissions'));
  }

  public function single($submissionhash) {
    if(!is_numeric (Hashids::decode($submissionhash)[0])) {
      abort(404);
    }
    $submission_id = Hashids::decode($submissionhash)[0];
    $submission = Submission::find($submission_id);

    return view('submission', compact('submission'));
  }

  public function catch(Request $request, $recipienthash) {

    $validatedData = $request->validate([
      'g-recaptcha-response' => 'required|captcha'
    ]);

    if(!is_numeric (Hashids::decode($recipienthash)[0])) {
      abort(404);
    }
    $recipient_id = Hashids::decode($recipienthash)[0];
    $recipient = User::find($recipient_id);
    if(!$recipient) {
      abort(404);
    }
    $formData = $request->all();

    // foreach ($formData as $key => $value) {
    //   if (is_array($value)) {
    //       $formData[$key] = trim(implode($value, ", "), ", ");
    //   }
    // }

    if($request->_honey) {
      abort(404);
    }

    $replyto = $request->_replyto ?? env('MAIL_FROM_ADDRESS');
    
    // Send email
    \Mail::to($recipient->email)->send(new NewSubmission($formData,$replyto));

    // Save submission
    $submission = new Submission ();
    $submission->form_data_raw = json_encode($formData);
    $submission->name = $request->name;
    $submission->_subject = $request->_subject ;
    $submission->email = $request->email;
    $submission->user_id = $recipient_id;

    $submission->save();


    if(!empty($formData['_redirect'])) {
      return redirect($formData['_redirect']);
    }
    else {
      return view('sent', compact('formData'));
    }
  }
}
