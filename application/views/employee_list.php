<!DOCTYPE html>
<html>

<head>
    <title>Employee List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        h2,
        h3 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            border-radius: 4px;
        }

        a {
            text-decoration: none;
            color: #2196F3;
            margin-right: 10px;
        }

        a:hover {
            text-decoration: underline;
        }

        .top-bar {
            margin-bottom: 20px;
        }

        .top-bar a.logout {
            float: right;
            color: red;
        }

        .add-btn {
            display: inline-block;
            margin: 10px 0;
            padding: 10px 15px;
            background: #4CAF50;
            color: white;
            border-radius: 4px;
            text-decoration: none;
        }

        .add-btn:hover {
            background: #45a049;
        }
    </style>
</head>

<body>
    <div class="top-bar">
        <h2>Welcome, <?php echo $this->session->userdata('name'); ?>!
            <a class="logout" href="<?php echo site_url('login/logout'); ?>">Logout</a>
        </h2>
    </div>

    <h3>Employee List</h3>

    <a class="add-btn" href="<?php echo site_url('employee/add'); ?>">+ Add New Employee</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Designation</th>
            <th>Salary</th>
            <th>Picture</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($employees as $emp): ?>
            <tr>
                <td><?php echo $emp['id']; ?></td>
                <td><?php echo $emp['name']; ?></td>
                <td><?php echo $emp['address']; ?></td>
                <td><?php echo $emp['designation']; ?></td>
                <td><?php echo $emp['salary']; ?></td>
                <td>
                    <?php if (!empty($emp['picture'])): ?>
                        <img src="<?php echo base_url('uploads/' . $emp['picture']); ?>" width="50" alt="Employee Photo">
                    <?php else: ?>
                        <span>No Image</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo site_url('employee/edit/' . $emp['id']); ?>">Edit</a>
                    <a href="<?php echo site_url('employee/delete/' . $emp['id']); ?>"
                        onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>