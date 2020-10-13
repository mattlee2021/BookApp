<h2> Your List of Books </h2>

<table>
<tr>
    <th> Book Title </th>
    <th> Author </th>
</tr>
    @foreach($data as $bookData) 
<tr> 
    <td> {{$bookData->Title}} </td>
    <td> {{$bookData->Author}}</td>
</tr>
    @endforeach

</table>