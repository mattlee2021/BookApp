# Book List Web App
This web app allows a user to add books to the user's own list. There are features such as searching for a book in your list by author or book title, sorting the list alphabetically by author or book title, exporting your list to a CSV or XML file, etc. The web app was built using Laravel 8.
# Installation 
To run the application, 
 - First, download Laravel Homestead - https://laravel.com/docs/8.x/installation - and this github repository. I found this youtube tutorials helpful -https://www.youtube.com/watch?v=b3HLNJvVzNo&ab_channel=QuentinWattTutorials (watch videos 1-4). 
    - Setting up homestead.yaml can be tricky. I used this forum to get more clarity on the folder and site mappings: https://laravel.io/forum/05-16-2014-homestead-yaml-folder-mapping
    - In video 3, the instructor runs `vagrant up` after setting up homestead.yaml. I found it helpful to run, first, `vagrant reload --provision`, while you are in your Homestead folder. After running, `vagrant reload --provision` then run `vagrant up` and follow the rest of the videos. 
 - If you followed the above tutorial, you should now have run `vagrant ssh` and be in the virutal machine. You should see this on your terminal window: ![image](https://user-images.githubusercontent.com/60365163/97126303-d83f3700-170c-11eb-94d8-592aa4792181.png)
 - You need to cd into the folder that holds the book list web app. Use this tutorial to get all setup: https://devmarketer.io/learn/setup-laravel-project-cloned-github-com/ (parts 4-10 are most relevant). 
    - Before moving onto step 4 of devmarketer tutorial, you have to be in the vagrant virtual machine, as shown in the above youtube tutorial
    - Setting up the .env file can also be tricky. Make sure your DB_USERNAME=homestead and DB_PASSWORD=secret. 
    - Note, you can run either `php artisan migrate` or `php artisan migrate:refresh` for part 10. 
 - Lastly, run `php artisan serve` and go to the url given from the terminal.  
# Testing
- First, you must install Laravel Dusk, when your are in your project folder in vagrant: https://laravel.com/docs/8.x/dusk#installation
- Make sure to delete the ExampleTest.php that Laravel Dusk automatically sets up in the app.
- When running tests, you must have two terminal windows open. One terminal window will be running the application via `php artisan serve`. The other terminal window should cd into the project folder and run `php artisan dusk`. Running `php artisan dusk` in an IDE terminal window will not work because your database is set up on your vagrant machine. 

 # Photos of Application 
 ![image](https://user-images.githubusercontent.com/60365163/97124669-657f8d00-1707-11eb-9a34-15e6d07114f3.png)
 ![image](https://user-images.githubusercontent.com/60365163/97124697-7a5c2080-1707-11eb-8bd3-da0675d61154.png)
 # Open Source Usage
 Feel free to clone this repository. Use it for learning, teaching, whatever you'd like. 


 
