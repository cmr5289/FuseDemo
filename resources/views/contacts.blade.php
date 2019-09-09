<h1>Contacts List</h1>
@foreach ($contacts as $contact)
    <h2>{{ $contact->firstName }} {{ $contact->lastName }}</h2>
    <table>
        <tr>
            <th>
                email
            </th>
            <th>
                phone
            </th>
            <th>s
                company
            </th>
        </tr>
        <tr>
            <td>
                {{ $contact->email }}     
            </td>
            <td>
                {{ $contact->phone }}
            </td>
            <td>
                {{ $contact->company->name }}
            </td>
        </tr>
    </table>
@endforeach