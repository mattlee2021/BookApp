<h2 id="TitleSecond"> Your List of Books </h2>

<table>
<tr>
    <th> Book Title </th>
    <th> Author </th>
    
</tr>
    @foreach($data as $bookData) 
<tr> 
    <td> {{$bookData->Title}} </td>
    <td> {{$bookData->Author}}</td>
   <td> <a href="/delete/{{$bookData->id}}"> <button> Delete This Entry</button> </a> <td> 
   <td> <a href="/edit/{{$bookData->id}}"> <button> Edit Author </button> </a> <td> 
   
    
</tr>
    @endforeach

</table>