<h1 id="Title"> Enter a Book and Author into the List </h1>


<form action="submit" method="POST" >
@csrf
<input type="text" name="book" placeholder="Book Title">
<br><br>
<input type="text" name="author" placeholder="Author of Book">
<br><br>
<button type="submit" name="addToList"> Add to List </button>
</form>

<br><br>

<form action="bookSearch" method="GET" > 
@csrf
<input type="text" name="bookLookup" placeholder="Look up a Book">
<br><br>
<button type="submit" name="searchBook"> Search For Book </button> 
</form>


<style>

#Title {
    color: green;
    text-align: center;
}

</style>
