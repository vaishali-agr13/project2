<h2>Applications List</h2>

<table border="1" width="100%" cellpadding="5">
    <thead>
        <tr>
            <th>Name</th>
            <th>Job Title</th>
            <th>Email</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($applications as $app)
        <tr>
            <td>{{ $app->full_name }}</td>
            <td>{{ $app->job->title ?? '' }}</td>
            <td>{{ $app->email }}</td>
            <td>{{ $app->created_at->format('d-m-Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>