<h1 id="Title"> Enter a Book and Author into the List </h1>


<form action="submit" method="POST" >
@csrf
<input type="text" name="book" placeholder="Book Title">
<br><br>
<input type="text" name="author" placeholder="Author of Book">
<br><br>
<button type="submit"> Add to List </button>
</form>


<style>

#Title {
    color: green;
    text-align: center;
}

</style>
