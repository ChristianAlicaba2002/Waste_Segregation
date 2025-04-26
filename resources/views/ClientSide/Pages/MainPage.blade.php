<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Dashboard</title>
    <link rel="icon" type="image/png" href="img/IM_logo.png">
    <link rel="stylesheet" href="Styles/MainPage.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <aside class="sidebar">
        <div class="user-info">
                <img src="/img/IM_logo.png" alt="IM Logo">
                <p class="name">TrashBinnie</p>
            </div>
        </div>
        <nav class="menu">
            <ul>
                <li class="active" onclick="showSection('homeContent')">
                    <img src="img/home.png" class="menu-icon" alt="Home Icon">
                    <span>Home</span>
                </li>
                <li onclick="showSection('userContent')">
                    <img src="img/user.png" class="menu-icon" alt="User Icon">
                    <span>User Information</span>
                </li>
                <li onclick="showSection('tableContent')">
                    <img src="img/table.png" class="menu-icon" alt="Table Icon">
                    <span>Table Record</span>
                </li>
            </ul>
        </nav>
        <div class="logout-form">
            <form action="{{ route('LogoutClient') }}" method="POST">
                @csrf
                <button type="submit" class="Logout">
                    <img src="img/logout.png" class="menu-icon" alt="Logout Icon">
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <div class="dashboard-container">
    <main class="content">
        <section id="homeContent" class="section active">
            <h1>Welcome {{ Auth::user()->username }}!</h1>
            <h5>UserID:
            <span>1202</span>
            </h5>
            <h5>Address:
            <span>1202</span>
            </h5>
            <h5>Status:
                <span class="status">Active</span>
            </h5>
            <div class="cards">
                <div class="data-card">
                    <h3>Paper</h3>
                    <p>Total Trash Collected:</p>
                    <p>301830</p>
                </div>
                <div class="data-card">
                    <h3>Plastic</h3>
                    <p>Total Trash Collected:</p>
                    <p>09808</p>
                </div>
                <div class="data-card">
                    <h3>Metal</h3>
                    <p>Total Trash Collected:</p>
                    <p>0809</p>
                </div>
            </div>
        </section>

        <section id="userContent" class="section">
            <div class="info-card">
            <h1> {{ Auth::user()->username }}'s Information</h1>
                <form action="#" method="post">
                    <div class="infovalue">
                        <h3>TrashBinnie ID:</h3>
                        <input type="text" name="trashbinID" value="" placeholder="Trash Bin ID" readonly>
                    </div>
                    <div class="infovalue">
                        <h3>ID:</h3>
                        <input type="text" name="homeId" value="{{ Auth::user()->client_id}}" placeholder="Home ID" readonly>
                    </div>
                    <div class="infovalue">
                        <h3>Username:</h3>
                        <input type="text" name="username" value="{{ Auth::user()->username}}" placeholder="Username" readonly>
                    </div>
                    <div class="infovalue">
                        <h3>First Name:</h3>
                        <input type="text" name="firstName" value="{{ Auth::user()->first_name }}" placeholder="First Name" required>
                    </div>
                    <div class="infovalue">
                        <h3>Last Name:</h3>
                        <input type="text" name="lastName" value="{{ Auth::user()->last_name }}" placeholder="Last Name" required>
                    </div>
                    <div class="infovalue">
                        <h3>Address:</h3>
                        <input type="text" name="address" value="{{ Auth::user()->address}}" placeholder="Address">
                    </div>
                    <div class="infovalue">
                        <button>Update Info</button>
                    </div>
                </form>
            </div>
        </section>

        <section id="tableContent" class="section">
            <h2>TrashBin Record</h2>
            <table>
                <thead>
                    <tr>
                        <th>Trash ID</th>
                        <th>Category</th>
                        <th>Time Thrown</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>001</td><td>Paper</td><td>08:30 AM</td></tr>
                    <tr><td>002</td><td>Plastic</td><td>10:15 AM</td></tr>
                    <tr><td>003</td><td>Metal</td><td>02:00 PM</td></tr>
                    <tr><td>004</td><td>Paper</td><td>04:30 PM</td></tr>
                </tbody>
            </table>
        </section>
    </main>
</div>

    <script>
        function showSection(sectionId) {
            const allSections = document.querySelectorAll('.section');
            allSections.forEach(section => {
                section.style.display = 'none';
            });

            const targetSection = document.getElementById(sectionId);
            if (targetSection) {
                targetSection.style.display = 'block';
            }

            const menuItems = document.querySelectorAll('nav ul li');
            menuItems.forEach(item => item.classList.remove('active'));

            const clickedItem = Array.from(menuItems).find(item =>
                item.getAttribute('onclick').includes(`showSection('${sectionId}')`)
            );
            if (clickedItem) {
                clickedItem.classList.add('active');
            }
        }

        window.onload = function () {
            showSection('homeContent');
        };
    </script>

</body>
</html>
