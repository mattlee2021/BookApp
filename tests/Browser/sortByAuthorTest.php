<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * This test works by, first, inserting two elements into our list. Both elements have the same 
 * book title, namely, 'book', but have different author names. 
 * One element has the author name of 1 Matt, and the other element has an author name of 2 Matt. 
 * After inserting both element, I have the test click on the "Sort By Author" button.
 * Since 1 Matt < 2 Matt (since 1 < 2), the top element should have 'book' as the Book Title and 
 * '1 Matt' as the Author. The test will then click 'Delete This Entry' for the top most row, so
 *  only the element with 'book' as the Book Title and '2 Matt' as the Author will remain.
 * 
 */

class sortByAuthorTest extends DuskTestCase
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

    public function test_sort_by_Author_insert_book_and_author1()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->type('book','Book')
                    ->type('author','2 Matt')
                    ->press('Add to List')
                    ->assertSee('Book')
                    ->assertSee('2 Matt');
        });
    }

    public function test_sort_by_Author_insert_book_and_author2()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->type('book','Book')
                    ->type('author','1 Matt')
                    ->press('Add to List')
                    ->assertSee('Book')
                    ->assertSee('1 Matt');
        });
    }

    public function test_sort_by_Author()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->press('Sort By Author')
                    ->assertSee('1 Matt')
                    ->assertSee('2 Matt')
                    ->press('Delete This Entry')
                    ->assertDontSee('1 Matt')
                    ->assertSee('2 Matt');
        });
    }
}
