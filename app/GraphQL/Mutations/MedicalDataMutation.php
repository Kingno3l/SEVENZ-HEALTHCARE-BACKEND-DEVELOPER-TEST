namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MedicalDataMutation {
public function submit($root, array $args) {
// Get the username of the currently authenticated user
$username = Auth::user()->username;

// Extract input data
$input = $args['input'];

// Prepare the email data
$emailData = [
'username' => $username,
'xray' => $input['xray'] ?? [],
'ultrasound' => $input['ultrasound'] ?? [],
'ct_scan' => $input['ct_scan'] ?? 'N/A',
'mri' => $input['mri'] ?? 'N/A',
];

// Structure the data and send it via email
Mail::send('emails.medical_data', $emailData, function ($message) use ($username) {
$message->to('gibelsoft@gmail.com')
->subject("{$username} medical data");
});

return [
'message' => 'Medical data submitted successfully.'
];
}
}