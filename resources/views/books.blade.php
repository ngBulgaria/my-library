<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Books</title>
</head>
<body>
 
<table border="1">
    <tr>
        <th>Name</th>
        <th>ISBN</th>
        <th>Year</th>
    </tr>
    @for($i = 0; $i < count($books); $i++)
        <tr>
            <td>{{ $books[$i]->name }}</td>
            <td>{{ $books[$i]->isbn }}</td>
            <td>{{ $books[$i]->year }}</td>
        </tr>
        <tr>
            <td colspan="3">{{ $books[$i]->description}}</td>
        </tr>
        <tr>
            <td colspan="3"></td>
        </tr>
    @endfor
</table>
 
</body>
</html>