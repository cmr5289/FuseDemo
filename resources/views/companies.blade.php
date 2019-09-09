<h1>Company List</h1>

 @foreach ($companies as $company)
    <h2>{{ $company->name }}</h2>
    <table>
        <tr>
            <th>
                address
            </th>
            <th>
                city
            </th>
            <th>
                state
            </th>
            <th>
                zip
            </th>
            <th>
                phone
            </th>
        </tr>
        <tr>
            <td>
                {{ $company->address }}     
            </td>
            <td>
                {{ $company->city }}
            </td>
            <td>
                {{ $company->state }}
            </td>
            <td>
                {{ $company->zip }}
            </td>
            <td>
                {{ $company->phone }}
            </td>
        </tr>
    </table>
@endforeach