<h2>API</h2>
<div>Using the provided CSV data, create an API route using Laravel that allows the data to be searched. </div>
<div>The data should be converted to a database table. Provide Laravel migrations and seeders within the project. </div>
<div>The API should search on: </div>
<div>•	Name: Should also match on partial names</div>
<div>•	Bedrooms: Exact match</div>
<div>•	Bathrooms: Exact match </div>
<div>•	Storeys: Exact match </div>
<div>•	Garages: Exact match </div>
<div>•	Price: Range (between $X and $Y) </div>
<div>All search parameters should be optional, we should be able to search for 2 bedroom houses, or 4 bedroom and 2 bathroom houses, etc. </div>
<div>The API should return JSON, with pure numeric data (not HTML content). </div>
<div>Frontend (Search Form) </div>
<div>Create a basic search form that will query the API using AJAX and display the results it receives from the backend. The searching result should be rendering to HTML table dynamically on the frontend, using reactive Vue.js/Javascript</div>
<div>There should be some sort of searching indicator, a spinning icon or similar. </div>
<div>A message should be displayed if no results were found. </div>

