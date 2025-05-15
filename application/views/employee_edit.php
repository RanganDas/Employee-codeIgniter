<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
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
        img {
            margin-top: 10px;
            display: block;
        }
        button {
            margin-top: 15px;
            padding: 10px 20px;
            background: #2196F3;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background: #1976D2;
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
    <h2>Edit Employee</h2>
    <a href="<?php echo site_url('employee'); ?>">← Back to List</a>
    
    <form method="post" action="<?php echo site_url('employee/update/'.$employee['id']); ?>" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $employee['name']; ?>" required>
        
        <label>Address:</label>
        <textarea name="address" required><?php echo $employee['address']; ?></textarea>
        
        <label>Designation:</label>
        <input type="text" name="designation" value="<?php echo $employee['designation']; ?>" required>
        
        <label>Salary:</label>
        <input type="number" name="salary" step="0.01" value="<?php echo $employee['salary']; ?>" required>
        
        <label>Current Picture:</label>
        <?php if($employee['picture']): ?>
            <img src="<?php echo base_url('uploads/'.$employee['picture']); ?>" width="50">
        <?php endif; ?>
        
        <label>Change Picture:</label>
        <input type="file" name="picture" accept="image/*">
        
        <button type="submit">Update</button>
    </form>
</body>
</html>
