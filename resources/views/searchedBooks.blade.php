<table>
<tr>
    <th> Book Title </th>
    <th> Author </th>
    
</tr>

@foreach($data as $bookData) 
<tr> 
    <td>{{$bookData->Title}}</td>
    <td>{{$bookData->Author}}</td>
</tr>
@endforeach
</table>

<br><br>

<a href="{{route('mainRoute')}}"> <button type="button"> Back to Main Page</button> </a>