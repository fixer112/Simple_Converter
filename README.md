# Simple_Converter
A simple unit converter with php backend

###### Show all converter
/index.php with GET request to show all available converter and unit

###### Create converter
/create.php with POST request start, end, start_unit and end_unit
e.g start:'kilogram' end:'Gram' start_unit:'1' end_unit:'1000'

###### Show specific converter
/select.php with GET request id

###### Update specific converter
/update.php with PUT/PATCH request name, value, id
e.g name:'start' value:'KG' id:'1'; name:'end' value:'G' id:1

###### Delete specific converter
/delete,php with DELETE request id
