<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        h2 {
            color: #333;
        }
        form {
            background: #f9f9f9;
            padding: 20px;
            width: 400px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input[type="text"], input[type="number"], textarea, input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            margin-top: 15px;
            padding: 10px 20px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background: #45a049;
        }
        a {
            text-decoration: none;
            color: #2196F3;
            margin-bottom: 20px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <h2>Add New Employee</h2>
    <a href="<?php echo site_url('employee'); ?>">← Back to List</a>
    
    <form method="post" action="<?php echo site_url('employee/save'); ?>" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" required>
        
        <label>Address:</label>
        <textarea name="address" required></textarea>
        
        <label>Designation:</label>
        <input type="text" name="designation" required>
        
        <label>Salary:</label>
        <input type="number" name="salary" step="0.01" required>
        
        <label>Picture:</label>
    <input type="file" name="picture" accept="image/*">
        
        <button type="submit">Save</button>
    </form>
</body>
</html>
