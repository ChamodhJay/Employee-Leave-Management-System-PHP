<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        /* CSS for the alert box and overlay */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }

        .alert-box {
            display: none;
            position: fixed;
            top: 56%;
            left: 59.8%;
            transform: translate(-50%, -50%);
            width: 1200px;
            padding: 20px;
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            box-shadow: 0px 0px 10px #ccc;
            text-align: center;
            z-index: 10000;

        }

        /* Custom styling for the alert box */
        .alert-box h4 {

            font-size: 18px;
            margin-bottom: 10px;
            display: flexbox;
            padding-left: 50%;




        }

        .alert-box p {
            font-size: 16px;
            margin-bottom: 20px;
            align-items: center;

        }

        .alert-box .close-icon {
            position: absolute;
            top: 10px;
            right: 15px;
            cursor: pointer;
            font-size: 30px;
            color: #4CAF50;
        }

        .print-button {
            margin-top: 10px;
        }

        .tbl {

            max-width: 150%;
            align-items: center;
            align-content: center;
            display: flex;
            border: 3px solid black;



        }


        * .tbl tr td {


            padding-top: 25px;
            color: blue;
        }
    </style>
</head>

<body>


    <!-- Button to trigger the alert box -->
    <button onclick="showAlertBox()" style="align-items: center; background-image: linear-gradient(135deg, #f34079 40%, #fc894d); border: 0; border-radius: 20px; box-sizing: border-box; color: #fff; cursor: pointer; display: flex; flex-direction: column; font-size: 14px; font-weight: 700; height: 50px; justify-content: center; letter-spacing: .4px; line-height: 1; max-width: 100%; padding-left: 20px; padding-right: 20px; margin-left:20%; padding-top: 3px; text-decoration: none; text-transform: uppercase; user-select: none; -webkit-user-select: none; touch-action: manipulation;" onmouseover="this.style.backgroundColor='#45a049'; this.style.transform='scale(1.1)'; this.style.fontSize='16px'; this.style.transition='font-size 0.3s'; this.style.boxShadow='0 0 10px rgba(0,0,0,0.3)';" onmouseout="this.style.backgroundColor='#4CAF50'; this.style.fontSize='16px'; this.style.transition='font-size 0.3s'; this.style.transform='scale(1)'; this.style.boxShadow='none';">
        Report
    </button>



    <!-- Overlay and Alert Box -->
    <div class="overlay"></div>
    <div id="alertBox" class="alert-box">

        <p>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th class="table-plus">EMPLOYEE NAME</th>
                    <th>ROLE</th>
                    <th>AVAILABLES LEAVES</th>
                    <th> LEAVES TAKEN</th>
                    <th>CASUAL LEAVES</th>
                    <th>MEDICAL LEAVES</th>

                </tr>
            </thead>
            <tbody>
                <tr class="table-primary">

                    <?php
                    $teacher_query = mysqli_query($conn, "select * from tblemployees LEFT JOIN tbldepartments ON tblemployees.Department = tbldepartments.DepartmentShortName where role != 'Admin' ORDER BY tblemployees.emp_id") or die(mysqli_error());
                    while ($row = mysqli_fetch_array($teacher_query)) {
                        $id = $row['emp_id'];
                    ?>

                        <td class="table-primary">
                            <div class="name-avatar d-flex align-items-center">
                                <div class="avatar mr-2 flex-shrink-0">
                                    <img src="<?php echo (!empty($row['location'])) ? '../uploads/' . $row['location'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
                                </div>
                                <div class="txt">
                                    <div class="weight-600"><?php echo $row['FirstName'] . " " . $row['LastName']; ?></div>
                                </div>
                            </div>
                        </td>

                        <td class="table-primary"><?php echo $row['role']; ?></td>
                        <td class="table-primary"><?php echo $row['Av_leave']; ?></td>
                        <td class="table-primary"><?php echo 41 - $row['Av_leave']; ?></td>
                        <td class="table-primary"><?php echo $row['Casual_leaves']; ?></td>
                        <td class="table-primary"><?php echo $row['Medical_leaves']; ?></td>

                </tr>
            <?php } ?>
            </tbody>
        </table>

        <div class="col-md-8">




            </h4>
            </p>

        </div>



        <span class="close-icon" onclick="hideAlertBox()">&times;</span>
        <!-- Print Button -->
        <button class="print-button" onclick="window.print()" style="background-color: #4CAF50; color: #fff; padding: 10px 20px; font-size: 16px; border: none; cursor: pointer;">
            Print
        </button>
    </div>

    <script>
        function showAlertBox() {
            var overlay = document.querySelector('.overlay');
            var alertBox = document.getElementById('alertBox');

            overlay.style.display = 'block';
            alertBox.style.display = 'block';
        }

        function hideAlertBox() {
            var overlay = document.querySelector('.overlay');
            var alertBox = document.getElementById('alertBox');

            overlay.style.display = 'none';
            alertBox.style.display = 'none';
        }
    </script>
</body>

</html>