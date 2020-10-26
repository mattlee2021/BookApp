<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * This test works by, first, inserting two elements into our list. Both elements have the same 
 * author name, namely, 'Matt', but have different book names. 
 * One element has the book name of 1 Book, and the other element has an author name of 2 Book. 
 * After inserting both element, I have the test click on the "Sort By Book" button.
 * Since 1 Book < 2 Book (since 1 < 2), the top element should have '1 Book' as the Book Title and 
 * 'Matt' as the Author. The test will then click 'Delete This Entry' for the top most row, so
 * the only element that will remain is '2 Book' as the Book Title and 'Matt' as the Author.
 * 
 */

class sortByBookTest extends DuskTestCase
{
    /** This method clears out the database table before running the tests */
    protected static $migrationRun=false;

    public function setUp():void 
    {
        parent::setUp();
        if(!static::$migrationRun) {
            $this->artisan('migrate:refresh');
            static::$migrationRun=true;
        }
    }

    public function test_sort_by_Book_insert_book_and_author1()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->type('book','2 Book')
                    ->type('author','Matt')
                    ->press('Add to List')
                    ->assertSee('2 Book')
                    ->assertSee('Matt');
        });
    }

    public function test_sort_by_Book_insert_book_and_author2()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->type('book','1 Book')
                    ->type('author','Matt')
                    ->press('Add to List')
                    ->assertSee('1 Book')
                    ->assertSee('Matt');
        });
    }

    public function test_sort_by_Book()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->press('Sort By Book Title')
                    ->assertSee('1 Book')
                    ->assertSee('2 Book')
                    ->press('Delete This Entry')
                    ->assertDontSee('1 Book')
                    ->assertSee('2 Book');
        });
    }
    

}
