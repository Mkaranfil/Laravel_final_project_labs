<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>{{$info->subject_id->contact_subjects->subject}}</title> --}}
</head>
<body>
    <p><span style="color:green">Subject:</span>{{$subjectFind}}</p>
    {{-- <p>teste: {{$info->subject_id->subject}}</p> --}}
    <p> <span style="color: blue">Envoye par:</span>{{$info->name}}</p>
    <p> <span style="color: blue">Email:</span>{{$info->email}}</p>
    <p><span style="color: blue">Message:</span>{{$info->message}}</p>
</body>
</html>