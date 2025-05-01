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


    @if(session('error'))
    <script>
        alert('{{session("error")}}')
    </script>
    @endif

    @if(session('success'))
    <script>
        alert('{{session("success")}}')
    </script>
    @endif


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
                <li onclick="showSection('supportContent')">
                    <img src="img/support.png" class="menu-icon" alt="Support Icon">
                    <span>Call Support</span>
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


    <!-- Main Container -->
    <div class="dashboard-container">

        <!-- Main Dashboard -->
        <main class="content">

            <!-- Dashboard Section -->
            <section id="homeContent" class="section active">
                <h1>Welcome {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!</h1>
                <h5>User ID:
                    <span>{{ Auth::user()->client_id }}</span>
                </h5>
                <h5>Binnie ID:
                    <span>{{ Auth::user()->binnie_id }}</span>
                </h5>
                <h5>Address:
                    <span>{{ Auth::user()->city }}, {{ Auth::user()->barangay }}, {{ Auth::user()->purok }}</span>
                </h5>
                <h5>Status:
                    <span class="status">Active</span>
                </h5>

                @if(count($categories) > 0)
                    <div class="cards">
                    <div class="data-card">
                        <h3>Paper</h3>
                        <p>Total Trash Collected:</p>
                        <p>{{ $paper }}</p>
                    </div>
                    <div class="data-card">
                        <h3>Plastic</h3>
                        <p>Total Trash Collected:</p>
                        <p>{{ $plastic }}</p>
                    </div>
                    <div class="data-card">
                        <h3>Metal</h3>
                        <p>Total Trash Collected:</p>
                        <p>{{ $metal }}</p>
                    </div>
                </div>

                @else
                <div class="cards">
                    <div class="data-card">
                        <h3>Paper</h3>
                        <p>Total Trash Collected:</p>
                        <p>0</p>
                    </div>
                    <div class="data-card">
                        <h3>Plastic</h3>
                        <p>Total Trash Collected:</p>
                        <p>0</p>
                    </div>
                    <div class="data-card">
                        <h3>Metal</h3>
                        <p>Total Trash Collected:</p>
                        <p>0</p>
                    </div>
                </div>
                @endif
    </section>

    <!-- User Information -->
    <section id="userContent" class="section">
        <div class="info-card">
            <h1> {{ Auth::user()->first_name }}'s Information</h1>
            <form action="{{route('update.client')}}" method="post">
                @csrf
                <div class="infovalue">
                    <h3>TrashBinnie ID:</h3>
                    <input type="text" name="trashbinID" value="{{ Auth::user()->binnie_id}}" placeholder="Trash Bin ID" readonly>
                </div>
                <div class="infovalue">
                    <h3>User ID:</h3>
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
                    <h3>City:</h3>
                    <input type="text" list="addressList" name="city" value="{{ Auth::user()->city}}" placeholder="City">
                    <datalist id="addressList">
                        <option value="Alcantara, Cebu">Alcantara, Cebu</option>
                        <option value="Alcoy, Cebu">Alcoy, Cebu</option>
                        <option value="Alegria, Cebu">Alegria, Cebu</option>
                        <option value="Argao, Cebu">Argao, Cebu</option>
                        <option value="Asturias, Cebu">Asturias, Cebu</option>
                        <option value="Badian, Cebu">Badian, Cebu</option>
                        <option value="Balamban, Cebu">Balamban, Cebu</option>
                        <option value="Bantayan, Cebu">Bantayan, Cebu</option>
                        <option value="Barili, Cebu">Barili, Cebu</option>
                        <option value="Bogo, Cebu">Bogo, Cebu</option>
                        <option value="Boljoon, Cebu">Boljoon, Cebu</option>
                        <option value="Borbon, Cebu">Borbon, Cebu</option>
                        <option value="Carcar, Cebu">Carcar, Cebu</option>
                        <option value="Carmen, Cebu">Carmen, Cebu</option>
                        <option value="Catmon, Cebu">Catmon, Cebu</option>
                        <option value="Cebu City, Cebu">Cebu City, Cebu</option>
                        <option value="Compostela, Cebu">Compostela, Cebu</option>
                        <option value="Consolacion, Cebu">Consolacion, Cebu</option>
                        <option value="Cordova, Cebu">Cordova, Cebu</option>
                        <option value="Dalaguete, Cebu">Dalaguete, Cebu</option>
                        <option value="Danao, Cebu">Danao, Cebu</option>
                        <option value="Dumanjug, Cebu">Dumanjug, Cebu</option>
                        <option value="Ginatilan, Cebu">Ginatilan, Cebu</option>
                        <option value="Liloan, Cebu">Liloan, Cebu</option>
                        <option value="Lapu-Lapu, City">Lapu-Lapu, City</option>
                        <option value="Madridejos, Cebu">Madridejos, Cebu</option>
                        <option value="Mandaue, Cebu City">Mandaue, Cebu City</option>
                        <option value="Minglanilla, Cebu">Minglanilla, Cebu</option>
                        <option value="Moalboal, Cebu">Moalboal, Cebu</option>
                        <option value="Oslob, Cebu">Oslob, Cebu</option>
                        <option value="Pilar, Cebu">Pilar, Cebu</option>
                        <option value="Pinamungahan, Cebu">Pinamungahan, Cebu</option>
                        <option value="Poro, Cebu">Poro, Cebu</option>
                        <option value="Ronda, Cebu">Ronda, Cebu</option>
                        <option value="San Fernando, Cebu">San Fernando, Cebu</option>
                        <option value="San Francisco, Cebu">San Francisco, Cebu</option>
                        <option value="San Remigio, Cebu">San Remigio, Cebu</option>
                        <option value="Santa Fe, Cebu">Santa Fe, Cebu</option>
                        <option value="Santander, Cebu">Santander, Cebu</option>
                        <option value="Sibonga, Cebu">Sibonga, Cebu</option>
                        <option value="Sogod, Cebu">Sogod, Cebu</option>
                        <option value="Tabogon, Cebu">Tabogon, Cebu</option>
                        <option value="Tabuelan, Cebu">Tabuelan, Cebu</option>
                        <option value="Talisay, Cebu">Talisay, Cebu</option>
                        <option value="Toledo, Cebu">Toledo, Cebu</option>
                        <option value="Tuburan, Cebu">Tuburan, Cebu</option>
                        <option value="Tudela, Cebu">Tudela, Cebu</option>
                        <option value="Tugbong, Cebu">Tugbong, Cebu</option>
                        <option value="Ulat, Cebu">Ulat, Cebu</option>
                        <option value="Umas, Cebu">Umas, Cebu</option>
                        <option value="Ubay, Cebu">Ubay, Cebu</option>
                        <option value="Valencia, Cebu">Valencia, Cebu</option>
                        <option value="Valladolid, Cebu">Valladolid, Cebu</option>
                        <option value="Zambujal, Cebu">Zambujal, Cebu</option>
                    </datalist>
                </div>
                <div class="infovalue">
                    <h3>Barangay:</h3>
                    <input type="text" name="barangay" value="{{ Auth::user()->barangay}}" placeholder="Barangay">
                </div>
                <div class="infovalue">
                    <h3>Purok:</h3>
                    <input type="text" name="purok" value="{{ Auth::user()->purok}}" placeholder="Purok">
                </div>
                <div class="infovalue">
                    <button>Update Info</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Table TrashBin -->
    
    <section id="tableContent" class="section">
        <h2>TrashBin Record</h2>
        <div class="table-legend-container">
            <div class="table-legend">
            <div class="legend-item">
                <span class="legend-color" style="background-color: #e74c3c;"></span>
                <span>Metal: 1</span>
            </div>
            <div class="legend-item">
                <span class="legend-color" style="background-color: #3498db;"></span>
                <span>Plastic: 2</span>
            </div>
            <div class="legend-item">
                <span class="legend-color" style="background-color: #2ecc71;"></span>
                <span>Paper: 3</span>
            </div>
            </div>
        </div>
    
        <table>
            <thead>
                <tr>
                    <th>Trash ID</th>
                    <th>Category</th>
                    <th>Time Thrown</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->item_id }}</td>
                    <td>{{ $category->category_id ? $category->category_id : 'No Category'}}</td>
                    <td>{{ $category->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <!-- Support Message -->
    <section id="supportContent" class="section">
        <div class="support-container">
            <h2>Contact Support</h2>
            <p>We're here to help! Send us a message and we'll get back to you as soon as possible.</p>
            <form action="{{ route('clientfeedback') }}" method="post" class="support-form">
                @csrf
                <h1>Binnie ID: {{ Auth::user()->binnie_id }}</h1>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="username" value="{{Auth::user()->username}}" placeholder="Your Email" readonly>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="5" placeholder="Enter your message" required></textarea>
                </div>
                <button type="submit" class="submit-button">Send Message</button>
            </form>
        </div>
    </section>

     <style>
     </style>

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

        window.onload = function() {
            showSection('homeContent');
        };
    </script>

</body>

</html>