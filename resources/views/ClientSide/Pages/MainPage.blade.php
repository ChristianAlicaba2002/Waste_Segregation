<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/MainPage.css">
    <link rel="icon" type="image/png" href="img/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <title>Client Page</title>
</head>
<body>

    <div class="sidebar">
        <button class="menu-item" onclick="showSection('homeContent')">
            <img src="img/home (1).png" alt="Home Icon" class="menu-icon">
            <span>Home</span>
        </button>
        <button class="menu-item" onclick="showSection('userForm')">
            <img src="img/user.png" alt="User Icon" class="menu-icon">
            <span>Account</span>
        </button>
        <button class="menu-item" onclick="showSection('trashInfo')">
            <img src="img/table.png" alt="Table Icon" class="menu-icon">
            <span>Table</span>
        </button>
        <div class="logout-form">
            <form action="{{route('LogoutClient')}}" method="post">
                @csrf
                <button class="Logout" type="submit">
                    <img src="img/logout.png" alt="Logout Icon" class="menu-icon">
                    <span>Log Out</span>
                </button>
            </form>
        </div>
    </div>

    <div id="homeContent" class="content-section">
        <h1>Hi There {{Auth::user()->username}}!</h1>
        <div class="logo-container">
            <img src="img/logo.png" alt="Logo" class="logo">
            <p>TrashBinnie</p>
        </div>
    </div>

    <div id="userForm" class="content-section" style="display: none;">
        <div class="form-container">
            <h3>Your Information</h3>
            <form action="#" method="post">
                <input type="text" name="homeId" value="{{Auth::user()->client_id}}" placeholder="Home ID" readonly style="cursor: not-allowed;">
                <input type="text" name="firstName" value="{{Auth::user()->first_name}}" placeholder="First Name" required>
                <input type="text" name="lastName" value="{{Auth::user()->last_name}}" placeholder="Last Name" required>
                <input type="text" name="username" value="{{Auth::user()->username}}" placeholder="Username" required>
                <input type="text" name="address" value="{{Auth::user()->address}}" placeholder="Address" required>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <div id="trashInfo" class="content-section" style="display: none;">
        <div class="container">
            <div class="table-container">
                <h2>TrashBin Record</h2>
                <table border="1" cellspacing="0" cellpadding="10">
                    <thead>
                        <tr>
                            <th>Trash ID</th>
                            <th>Category</th>
                            <th>Time Thrown</th>
                            <th>Trash Bin Collected Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>001</td><td>Paper</td><td>08:30 AM</td><td>09:00 AM</td></tr>
                        <tr><td>002</td><td>Plastic</td><td>10:15 AM</td><td>11:00 AM</td></tr>
                        <tr><td>003</td><td>Metal</td><td>02:00 PM</td><td>02:45 PM</td></tr>
                        <tr><td>004</td><td>Paper</td><td>04:30 PM</td><td>05:15 PM</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function showSection(sectionId) {
            const sections = ['homeContent', 'userForm', 'trashInfo'];
            sections.forEach(id => {
                document.getElementById(id).style.display = id === sectionId ? 'block' : 'none';
            });
        }
    </script>
</body>
</html>
