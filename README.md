# CHT2520 Assignment 2 U2366348 Victoria Wilson

## How to install and run the project ## 
Run 'php artisan serve' in the terminal, open port 8000 and add /buses onto the end of the page's URL.

## About ##
This application is a website that hosts an interface for viewing a database of vehicles stored at the Sandtoft trolleybus museum. New buses can be added, and the attributes of existing buses can be changed by authorised users.
Most of the different pages are accessible by using the navigation bar at the top of the pages, like the Home, About, and Status pages. However, the Add New Bus page is restricted to users without the authorisation of the appropriate level.

The option to 'Log in' is only visible on the navigation bar if the user is not already logged in, and only once they are logged in is the option to 'Log out' displayed.
```
<li style="float:right"> 
        @auth
      <div class="element_container">
        <div class="element1">Logged in as {{Auth::user()->name}}</div>
        <div class="element2">
          <div class="submit">
            <form method='POST' action='/logout'>
              @csrf
              <button type='submit'>Log out</button>
            </form>
          </div>
        </div>
      </div>
      @endauth
          <div class="sign_in">
            @guest
            <li><a href="/login">Sign in</a></li>
            @endguest
```
The Home page displays the full list of every bus currently stored in the Bus database, organised in a table with 6 results per page.
Below is the php code in BusController for the Home page.
```
function index()
    {
        $buses = Bus::simplePaginate(6);
        return view('buses.index',['buses' => $buses]);
    }
```

Having a small proportion of the entries being shown per page is beneficial as too many entries displayed at once would increase loading time of the page, and would be difficult to view on smaller screen sizes. The table can be traversed using the forward and backward arrows below it. One possible drawback of needing the buttons to traverse the table is that some people could lack the dexterity to use the mouse precisely enough to click within the boundaries of the button.

Details about an individual bus are accessed by clicking the link in the respective numberplate cell, which navigates to the Show page for that bus. The Show page will display all information stored in the Bus database about that bus. Below the information, if the user has the authorisation for it, are buttons to edit and delete the buses' entry.

When editing the details of a bus, the user can see the previous values displayed vertically in a manner that makes it easy to quickly change any of the fields. If anything was able to be improved here, the numberplate field would be disabled if the Unregistered box was ticked, currently if a value is inserted in the numberplate field and the box is ticked, the value is overwritten and saved as being unregistered. Any changes to the entry can be saved by clicking the Save Changes button at the bottom of the page.

The CSS that was used attempts to keep all colours of text and background consistent and at a good contrast to each other, all text should be easily readable. The hover effect used on the buttons make the page feel more responsive. (W3Schools, n.d.)

## Multiple Tables ##
This application implements two tables, the original Buses table and the new table Statuses, which holds information about the various statuses that could be held by the buses. Statuses has a one-to-many relationship to Buses, as each status can belong to many different buses, but a bus will only have one status at a time.
The Status model implements a hasMany relationship to the Bus model, and likewise the Bus model implements a belongsTo relationship to Status(CHT2520-web-prog, 2025).
This is how Status implements the hasMany relationship.
```
class Status extends Model
{
    public function buses(): HasMany
    {
        return $this->hasMany(Bus::class);
    }
}
```
The status of a bus can be selected via radio buttons in the create and edit views, alongside all the other text fields.(GeeksforGeeks, 2024)(Align Input Elements and Labels into Two Seperate Columns, n.d.) The status of a bus can be viewed alongside the other information in the show view. Creating a separate database for this data is beneficial over simply having a free-fill text field, as there are limited types of status to choose between, unlike the larger amount of options for the chassis or city of origin, where most buses have unique values. A limitation of this system however is that a bus could be a combination of categories (e.g. On Loan and Maintenance needed), and only being able to choose one wouldn't be fully accurate to real life.

| Id| Chassis | Entered Service | Withdrawn | Numberplate | Origin | Status_id |
| ----------- | ----------- | ----------- | ----------- | ----------- | ----------- | ----------- |
| 1 | Karrier MS2 | 1947 | 1964 | CVH 741 | Huddersfield | 1 |
| 2 | British United Traction 9613T | 1958 | 1967 | FYS 839 | Glasgow | 2 |

| Id| Name | Description | Filename |
| ----------- | ----------- | ----------- | ----------- |
| 1 | Currently running  | This bus has no major faults and has been found safe to be used by the public, any bus with this status has a chance to be used during open days | Running.png |
| 2 | Maintenance needed | This bus needs some minor repairs like some fresh oil or water leakage, but soon this bus will be good to run on open days. | Maintenance.png |


The Status table links to the Buses table by implementing a foreign key status_id in the Buses table. This links to the id of the entry in the Statuses table, and allows the Buses entry's status to be chosen when a user is adding or editing the details.
```
public function up(): void
    {
    Schema::table('buses', function (Blueprint $table) {
        $table->unsignedBigInteger('status_id');
        $table->foreign('status_id')->references('id')->on('statuses');
        });
    }
```

## User authentication and Authorisation ##
This application implements user authentication; multiple users are stored in a database and have different levels of access(CHT2520-Web-Prog/Authentication-Authorisation, 2025)(Authentication - Laravel 12.x - the PHP Framework for Web Artisans, 2025). Type one can view the full list of buses, but a level two user has all the abilities of the level one user with the added ability of being able to edit the details and add new buses. A user logs in by selecting the button on the navigation bar and inputs an email address and password. These fields have validation fields like the edit and create pages, if the email address and/or password is left out or incorrect the user will be returned to the page with an error message. Once the user has been logged in successfully, the user’s identity is displayed on the navbar adjacent to the log out button, and the log in button will not appear until the user logs out.

Authorisation is used throughout the application to control whether a user is able to perform certain actions, like deleting an entry in a database or accessing a page. 
```
<div class="navbar">
    <nav>
      <ul>
        <li><a href="/buses">Home</a></li>
        @can('edit')
        <li><a href="/buses/create">Add new bus</a></li>
        @endcan
        <li><a href="/buses/about">About</a></li>
        <li><a href="/statuses">Status</a></li>
```
These functions were implemented because the ability to add or edit a bus should be restricted to only those who could be trusted to not put fake entries into the database. A limitation could be that if a non-authorised user genuinely had a correction for data of a bus, they would have to contact an admin user somehow. Another limitation is that an admin user could leave their session running and unattended, and any authorisation protocols would be rendered useless.

```
Route::get('/buses', [BusController::class, 'index']);
Route::post('/buses', [BusController::class, 'store'])->middleware(['auth', 'can:edit']);
Route::patch('/buses', [BusController::class, 'update'])->middleware('auth');
```


## Bibliography ##
W3Schools. (n.d.). HTML Div Tutorial. Www.w3schools.com. https://www.w3schools.com/html/html_div.asp
CHT2520-web-prog. (2025). GitHub - CHT2520-web-prog/eloquent-relationships. GitHub. https://github.com/CHT2520-web-prog/eloquent-relationships
GeeksforGeeks. (2024, October 16). How to Align input forms in HTML? GeeksforGeeks. https://www.geeksforgeeks.org/html/how-to-align-input-forms-in-html/
Align Input elements and labels into two seperate columns. (n.d.). Stack Overflow. https://stackoverflow.com/questions/24216429/align-input-elements-and-labels-into-two-seperate-columns
CHT2520-web-prog/authentication-authorisation. (2025). GitHub. https://github.com/CHT2520-web-prog/authentication-authorisation
Authentication - Laravel 12.x - The PHP Framework For Web Artisans. (2025). Laravel.com. https://laravel.com/docs/12.x/authentication