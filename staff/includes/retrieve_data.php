<?php
// Assuming you have already established a database connection
$connection = mysqli_connect('localhost', 'root', '', 'leave_staff');

// Check the database connection
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Perform a query to retrieve the count of available emp_id and staff count
$query = "SELECT COUNT(DISTINCT emp_id) AS EmployeeCount, COUNT(DISTINCT CASE WHEN role = 'Staff' THEN emp_id END) AS StaffCount FROM tblemployees";
$result = mysqli_query($connection, $query);

// Fetch the emp_id count and staff count
$row = mysqli_fetch_assoc($result);
$employeeCount = $row['EmployeeCount'];
$staffCount = $row['StaffCount'];

// Calculate the total leave count per employee, staff, and department
$query = "SELECT SUM(Av_leave) AS TotalLeave FROM tblemployees";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$totalLeaveCount = $row['TotalLeave'];

// Calculate the average leave count per employee, staff, and department
$averageLeaveCountPerEmployee = $totalLeaveCount / $employeeCount;
$averageLeaveCountPerStaff = $totalLeaveCount / $staffCount;

$query = "SELECT Department, SUM(Av_leave) AS DepartmentLeave, COUNT(DISTINCT emp_id) AS DepartmentEmployeeCount FROM tblemployees GROUP BY Department";
$result = mysqli_query($connection, $query);
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $department = $row['Department'];
    $departmentLeaveCount = $row['DepartmentLeave'];
    $departmentEmployeeCount = $row['DepartmentEmployeeCount'];
    $averageLeaveCountPerDepartment = $departmentLeaveCount / $departmentEmployeeCount;

    $data[] = array(
        'Category' => ' ' . $department,
        'Leave' => $averageLeaveCountPerDepartment
    );
}

// Create the data array for the pie chart
$data[] = array(
    'Category' => 'Leave',
    'Leave' => $averageLeaveCountPerEmployee
);
$data[] = array(
    'Category' => 'Staff',
    'Leave' => $averageLeaveCountPerStaff
);

// Convert the data to JSON format
$jsonData = json_encode($data);

// Close the database connection
mysqli_close($connection);
?>

