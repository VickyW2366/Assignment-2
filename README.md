# CHT2520 Assignment 1 U2366348 Victoria Wilson

## About ##
This application is a website that hosts an interface for viewing a databases of vehicles stored at the Sandtoft trolleybus museum.

## Index page ##
The home page shows all vehicles owned over 3 pages, which you can move between by selecting the previous/next buttons. Each vehicle listed is listed in a table using the city it served and its number plate to distinguish them. The number plate of each vehicle is a link to the page about that specific vehicle.

## Show page ##
The 'show' page for each vehicle displays all the information saved about it: The chassis as the heading, the year it entered service, the year it was withdrawn from service, the number plate, and the town or city it was used in.

## Editing a page ##
An entry in the database can be changed by clicking the 'Edit' button below the information on the Show page. The button will take the user to the Edit page, where all the fields will be populated with the prior information, and the user can change any of the fields provided the new values still satisfy the validation rules.

## Navigation bar ##
Movement between the Home, About, and Add new bus pages can be achieved by selecting the desired button on the navbar, which is at the top of the screen on all pages.

## Add new bus page ##
This page has a form with five fields: Chassis, Entered service, Withdrawn from service, Numberplate, and Origin which are all required, However Numberplate has an alternative checkbox which can be selected instead if a bus is unregistered. Entered and Withdrawn must both be years between 1882 and 2025, and the Withdrawn year must be after the Entered service year. Origin must be a string value as it will only be a town or city.
The form can be submitted by clicking the red button below all the forms that reads 'Save the bus'. All fields will repopulate if any are found to be inadequate.

## MVC ##
This application demonstrates the MVC design pattern in this project by dividing the code between the Model, View, and Controller components.\
The Model component handles the requests between components for information.

The View component handles the HTML for the different pages, and sends any input recieved to the Controller.
```
<x-layout title="List the buses">
    <h1>Here's our full list of buses:</h1>
    <p></p>
    <table>
      <tr>
        <th>City of Service</th>
        <th>Numberplate</th>
      </tr>
      @foreach ($buses as $bus)
      <tr>
          <td>{{$bus->origin}}</td>
          <td><a href="/buses/{{$bus->id}}">
          {{$bus->numberplate}}</td>
        </a>
      </tr>
      @endforeach
  </table>
  <p></p>
```
The Controller component handles the input received from View, and performs any neccesary updates.
```
function show($id)
    {
        $bus = Bus::find($id);
        return view('buses.show', ['bus' => $bus]);
    }
``` 

## The Table ##
| Id| Chassis | Entered Service | Withdrawn | Numberplate | Origin |
| ----------- | ----------- | ----------- | ----------- | ----------- | ----------- |
| 1 | Karrier MS2 | 1947 | 1964 | CVH 741 | Huddersfield |
| 2 | British United Traction 9613T | 1958 | 1967 | FYS 839 | Glasgow |

This is an example of how the data is laid out in the table used by the application. Each cell only holds one value, and the 'Id' value is always unique so it can be used for identification. The application handles basic CRUD operations involving the table mostly using the BusController.php file and respective blade files.

<h1>Additional requirements</h1>

## Validation ##
This application provides user input validation using the laravel framework in the 'Store' and 'Update' functions in BusController. All fields have some form of validation, Chassis merely being required, and Withdrawn from Service needs be an integer between the date it entered service and 2026. Numberplate needed a custom validation message as there is also a checkbox to consider, so the message parameter was used to specify the requirements to the user.

## Pagination ##
On the Index page, the full list of buses is displayed over three pages, four results being shown on a page at a time. The total number of results is shown alongside how far down the list the table is displaying. Movement between the pages is acheived by selecting either 'Previous' or 'Next' below the table.