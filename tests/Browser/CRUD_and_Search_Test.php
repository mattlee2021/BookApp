<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CRUD_and_Search_Test extends DuskTestCase
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
    

    public function test_insert_book_and_author()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->type('book','Book by Matt')
                    ->type('author','Author Original Matt')
                    ->press('Add to List')
                    ->assertSee('Book by Matt')
                    ->assertSee('Author Original Matt');
        });
    }

    public function test_search_by_book()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->type('bookLookup','Book by Matt')
                    ->press('Search For Book')
                    ->assertSee('Book by Matt')
                    ->assertSee('Author Original Matt')
                    ->assertPathBeginsWith('/bookSearch');
        });
    }
    public function test_search_by_author()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->type('AuthorLookup','Author Original Matt')
                    ->press('Search For Author')
                    ->assertSee('Book by Matt')
                    ->assertSee('Author Original Matt')
                    ->assertPathBeginsWith('/authorSearch');
        });
    }

    public function test_edit_author()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->press('Edit Author')
                    ->assertPathBeginsWith('/edit')
                    ->type('authorEdit', 'Author Edited Matt')
                    ->press('Update')
                    ->assertPathIs('/')
                    ->assertSee('Book by Matt')
                    ->assertSee('Author Edited Matt')
                    ->assertDontSee('Author Original Matt');
        });
    }


    public function test_download_files()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->press('Export Data to CSV with Author and Title')
                    ->press('Export Data to XML with Author and Title')
                    ->assertPathIs('/');
        });
    }

    public function test_delete_data()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->press('Delete This Entry')
                    ->assertDontSee('Book by Matt')
                    ->assertDontSee('Author Edited Matt')
                    ->assertPathIs('/');
        }); 
    }


    
}
