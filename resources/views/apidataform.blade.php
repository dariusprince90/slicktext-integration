<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Data - API WORK</title>

    
    <link rel="stylesheet" href="{{ asset('css/form-style.css') }}">

    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="date"],
input[type="email"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

        </style>

   
</head>
<body class="antialiased">
    <h1>Add Data</h1>
<div class="container">
    <form action="{{ route('save.contact') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="number">Number:</label>
            <input type="text" name="number" id="number" required>
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" name="city" id="city" >
        </div>
        <div class="form-group">
            <label for="state">State:</label>
            <input type="text" name="state" id="state" >
        </div>
        <div class="form-group">
            <label for="zipcode">Zipcode:</label>
            <input type="text" name="zipcode" id="zipcode" >
        </div>
        <div class="form-group">
            <label for="country">Country:</label>
            <input type="text" name="country" id="country" >
        </div>
        
        <div class="form-group">
            <label for="subscribed_date">Subscribed Date:</label>
            <input type="date" name="subscribed_date" id="subscribed_date" >
        </div>
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" >
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" >
        </div>
       
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" >
        </div>
        
    
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    
</div>
    
</body>
</html>
