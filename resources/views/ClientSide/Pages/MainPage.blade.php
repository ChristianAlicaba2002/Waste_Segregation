<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/MainPage.css">
    <title>Client Page</title>
</head>
<body>
    <form action="{{route('LogoutClient')}}" method="post">
        @csrf
        <button class="logout" type="submit">
            <img src="img/logout.png" alt="Logout Icon" class="logout-icon">
        </button>
    </form>

    <div class="user-profile" onclick="toggleForm()">
        <img src="img/user.png" alt="User Profile">
    </div>

    <div class="container">
        <h1 class="TrashRec">Trash Record</h1>
        <div class="table-container" id="trashInfo">
            <table>
                <thead>
                    <tr>
                        <th>Trash ID</th>
                        <th>Category</th>
                        <th>Time Thrown</th>
                        <th>Trash Bin Collected Time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>Paper</td>
                        <td>08:30 AM</td>
                        <td>09:00 AM</td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>Plastic</td>
                        <td>10:15 AM</td>
                        <td>11:00 AM</td>
                    </tr>
                    <tr>
                        <td>003</td>
                        <td>Metal</td>
                        <td>02:00 PM</td>
                        <td>02:45 PM</td>
                    </tr>
                    <tr>
                        <td>004</td>
                        <td>Paper</td>
                        <td>04:30 PM</td>
                        <td>05:15 PM</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="form-container" id="userForm">
            <h3>Edit User Info</h3>
            <form action="#" method="post">
                <input type="text" name="homeId" placeholder="Home ID" required>
                <input type="text" name="firstName" placeholder="First Name" required>
                <input type="text" name="lastName" placeholder="Last Name" required>
                <input type="text" name="username" placeholder="Username" required>
                <input type="text" name="address" placeholder="Address" required>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script>
        function toggleForm() {
            var form = document.getElementById('userForm');
            form.style.display = form.style.display === 'block' ? 'none' : 'block';
        }
    </script>

</body>
</html>
