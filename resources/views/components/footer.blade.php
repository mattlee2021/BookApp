<br><br>
<a href="{{route('bookSort')}}"> <button type="button"> Sort By Book Title</button> </a> 
<a href="{{route('authorSort')}}"> <button type="button"> Sort By Author </button> </a>
<br><br>
<a href="{{route('exportCSV_Both')}}"> <button type="button"> Export Data to CSV with Author and Title</button> </a>
<a href="{{route('exportCSV_Auth')}}"> <button type="button"> Export Data to CSV with Author Only</button> </a>
<a href="{{route('exportCSV_Book')}}"> <button type="button"> Export Data to CSV with Title Only</button> </a>
<br><br>
<a href="{{route('exportXML_Both')}}"> <button type="button"> Export Data to XML with Author and Title</button> </a>
<a href="{{route('exportXML_Auth')}}"> <button type="button"> Export Data to XML with Author Only</button> </a>
<a href="{{route('exportXML_Book')}}"> <button type="button"> Export Data to XML with Title Only</button> </a>