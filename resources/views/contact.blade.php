<h1>{{ $contact->firstName }} {{ $contact->lastName }}</h1>
<h2>
    Email:
</h2>
<p>
    {{$contact->email}}
</p>
<h2>
    Phone:
</h2>
<p>
    {{$contact->phone}}
</p>
<h2>
    Company:
</h2>
<p>
    {{$contact->company->name}}
</p>
