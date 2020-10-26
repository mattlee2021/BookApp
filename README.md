# Book List Web App
This web app allows a user to add books to the user's own list. There are features such as searching for a book in your list by author or book title, sorting the list alphabetically by author or book title, exporting your list to a CSV or XML file, etc. The web app was built using Laravel 8.
# Installation 
To run the application, 
 - First, download Laravel Homestead - https://laravel.com/docs/8.x/installation. I found this youtube tutorials helpful -https://www.youtube.com/watch?v=b3HLNJvVzNo&ab_channel=QuentinWattTutorials (watch parts 1-4). 
    - Setting up homestead.yaml can be tricky. I used this forum to get more clarity on the folder and site mappings: https://laravel.io/forum/05-16-2014-homestead-yaml-folder-mapping
 - Second, make your way into the Laravel project folder where the Book List Web App lives. Use this tutorial to get all setup: https://devmarketer.io/learn/setup-laravel-project-cloned-github-com/ (parts 1-10 are most relevant). 
    - Setting up the .env file can also be tricky. Make sure your DB_USERNAME=homestead and DB_PASSWORD=secret. 
    - Note, you can run either `php artisan migrate` or `php artisan migrate:refresh` for part 10. 
 - Lastly, run `php artisan serve` and go to the url given from the terminal.  
 # Photos of Application 
 ![image](https://user-images.githubusercontent.com/60365163/97124669-657f8d00-1707-11eb-9a34-15e6d07114f3.png)
 ![image](https://user-images.githubusercontent.com/60365163/97124697-7a5c2080-1707-11eb-8bd3-da0675d61154.png)
 # Open Source Usage
 Feel free to clone this repository. Use it for learning, teaching, whatever you'd like. 


 
