# CHT2520 Assignment 2 U2366348 Victoria Wilson
php artisan serve

php artisan migrate:fresh --seed

## About ##
This application is a website that hosts an interface for viewing a database of vehicles stored at the Sandtoft trolleybus museum. New buses can be added, and the attributes of existing buses can be changed by authorised users.
Most of the different pages are accessible by using the navigation bar at the top of the pages, like the Home, About, and Status pages. However the Add New Bus page is restricted to users without the authorisation of the appropriate level .
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
The option to 'Log in' is only visible on the navigation bar if the user is not already logged in, and only once they are is the option to 'Log out' displayed.
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
The Home page displays the full list of every bus currently stored in the Bus database, organised in a table with 6 results per page. Below is the HTML in buses/layout.blade.php
```
@foreach ($buses as $bus)
      <tr>
          <td>{{$bus->origin}}</td>
          <td><a href="/buses/{{$bus->id}}">
          {{$bus->numberplate}}</td></a>
          <td>{{$bus->status->name}}</td>
      </tr>
      @endforeach
```
Below is the php code in BusController for the Home page.
```
function index()
    {
        $buses = Bus::simplePaginate(6);
        return view('buses.index',['buses' => $buses]);
    }
```

Having a small proportion of the entries being shown per page is beneficial as too many entries displayed at once would increase loading time of the page, and would be difficult to view on smaller screen sizes. The table can be traversed using the forward and backward arrows below it.

Details about an individual bus are accessed by clicking the link in the respective numberplate cell, which navigates to the Show page for that bus. The Show page will display all information stored in the Bus database about that bus. Below the information, if the user has the authorisation for it, are buttons to edit and delete the buses' entry.

When editing the details of a bus, the user can see the previous values displayed vertically in a manner that makes it easy to quickly change any of the fields. If anything was able to be improved here, the numberplate field would be disabled if the Unregistered box was ticked, currently if a value is inserted in the numberplate field and the box is ticked, the value is overwritten and saved as being unregistered. Any changes to the entry can be saved by clicking the Save Changes button at the bottom of the page.

The CSS that was used attempts to keep all colours of text and background consistent and at a good contrast to each other, all text should be easily readable. The hover effect used on the buttons make the page feel more responsive.

## How to install and run the project ## 
Run php artisan serve in the terminal, open port 8000 and add /buses onto the end of the page's URL.

## additional features that have been implemented for Assignment 2. ##
For each of the additional features you should provide code samples, explain how and where you have used the feature, and present a critical analysis of the tools/technique/approach used that considers issues such as your reason for selecting it, a discussion of the problem it solves, and any potential limitations

## Multiple Tables ##
This application implements two tables, the original Buses table and the new table Statuses, which holds information about the various status held by the buses. Statuses has a one-to-many relationship to Buses, as each status can belong to many different buses, but a bus will only have one status at a time.
The Status model implements a hasMany relationship to the Bus model, and likewise the Bus model implements a belongsTo relationship to Status.
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
The status of a bus can be selected via radio buttons in the create and edit views, alongside all the other text fields. The status of a bus can be viewed alongside the other information in the show view. Creating a separate database for this data is beneficial over simply having a free-fill text field, as there are only 5 types of status to choose between.
a discussion of the problem it solves, and any potential limitations


| Id| Chassis | Entered Service | Withdrawn | Numberplate | Origin |
| ----------- | ----------- | ----------- | ----------- | ----------- | ----------- |
| 1 | Karrier MS2 | 1947 | 1964 | CVH 741 | Huddersfield |
| 2 | British United Traction 9613T | 1958 | 1967 | FYS 839 | Glasgow |

| Id| name | description | filename |
| ----------- | ----------- | ----------- | ----------- |
| 1 | Currently running  | This bus has no major faults and has been found safe to be used by the public, any bus with this status has a chance to be used during open days | Running.png |
| 2 | Maintenance needed | This bus needs some minor repairs like some fresh oil or water leakage, but soon this bus will be good to run on open days. | Maintenance.png |


## User authentication and Authorisation ##
This application implements user authentication; multiple users are stored in a database and have different levels of access. Type one can view the full list of buses, but a level two user has all the abilities of the level one user with the added ability of being able to edit the details and add new buses. A user logs in by selecting the button on the navigation bar and inputs an email address and password. These fields have validation fields like the edit and create pages, if the email address and/or password is left out or incorrect the user will be returned to the page with an error message. Once the user has been logged in successfully, the user’s identity is displayed on the navbar adjacent to the log out button, and the log in button will not appear until the user logs out.

Authorisation is used throughout the application to control whether a user is able to perform certain actions, like deleting an entry in a database or accessing a page. 

These functions were implemented because the ability to add or edit a bus should be restricted to only those who could be trusted to not put fake entries into the database. A limitation could be 

reason for selecting it, a discussion of the problem it solves, and any potential limitations

```
Route::get('/buses', [BusController::class, 'index']);
Route::post('/buses', [BusController::class, 'store'])->middleware(['auth', 'can:edit']);
Route::patch('/buses', [BusController::class, 'update'])->middleware('auth');
```

bootstrap/react/javascript










## TODO ##
make unregistered/status old values show up when the data isnt valid or being edited like all other fields
use javascript to show validation errors
pagination buttons
optimise css (table)


## Bibliography ##
W3Schools . HTML Div Tutorial. W3Schools. https://www.w3schools.com/html/html_div.asp
https://www.geeksforgeeks.org/html/how-to-align-input-forms-in-html/
https://www.w3schools.com/js/js_intro.asp
https://stackoverflow.com/questions/24216429/align-input-elements-and-labels-into-two-seperate-columns