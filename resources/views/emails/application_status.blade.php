<p>Hello {{ $application->name }},</p>

@if($application->status == 'approved')
    <p>Your application has been <b style="color:green;">Approved</b>.</p>
@else
    <p>Your application has been <b style="color:red;">Rejected</b>.</p>
@endif

<p>Thank you for applying.</p>