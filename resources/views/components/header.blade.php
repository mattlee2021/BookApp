
<h1 id="TitleMain"> A Book List </h1>



<form action="submit" method="POST" >
@csrf
<input type="text" name="book" placeholder="Book Title">
<span id="error">@error('book'){{$message}}@enderror</span>
<br><br>
<input type="text" name="author" placeholder="Author of Book">
<span id="error">@error('author'){{$message}}@enderror</span>
<br><br>
<button type="submit" name="addToList"> Add to List </button>
</form>

<br><br>

<form action="bookSearch" method="GET" id="bookLook"> 
@csrf
<input type="text" name="bookLookup" placeholder="Look up a Book">
<span id="error">@error('bookLookup'){{$message}}@enderror</span>
<br><br>
<button type="submit" name="searchBook"> Search For Book </button> 
</form>

<br><br>

<form action="authorSearch" method="GET" id="authorLook"> 
@csrf
<input type="text" name="AuthorLookup" placeholder="Look up an Author">
<span id="error">@error('AuthorLookup'){{$message}}@enderror</span>
<br><br>
<button type="submit" name="searchAuthor"> Search For Author </button> 
</form>



