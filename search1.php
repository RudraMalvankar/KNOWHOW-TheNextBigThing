<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="search.css">
    <title>Vidyagiri-Search</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

        html {
            scroll-behavior: smooth;
        }

        * {
            margin: 0;
            padding: 0;
            outline: none;
            list-style: none;
            text-decoration: none;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        body {
            background: #DECAFF; 
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            cursor: url('custom-cursor.png'), auto;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        nav {
            width: 100%;
            height: 90px;
            padding: 0px 50px;
            background-color: #FFF4E0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: #e4dede solid 1px;
        }

        .navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo1 {
            width: 200px;
            height: 200px;
            margin-left: -40px;
            padding-top: 20px;
        }

        
.dropdown {
  position: absolute; /* Set position to absolute */
  top: 0; /* Align to the top */
  right: 0; /* Align to the right */
  padding-top: 0.5rem;
  padding-right: 1rem;
}

.dropbtn {
  background-color: #C78DCC;
  color: white;
  padding: 12px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  z-index: 1;
  right: 0; /* Align with the right edge of the dropdown button */
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {
  background-color: #f1f1f1;
}

.show {
  display: block;
}


        .search-container {
            display: flex;
            align-items: center;
            padding: 20px;
            margin: 20px auto;
            width: 80%;
            max-width: 850px;
            background-color: #FFF;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        input {
            flex: 1;
            padding: 10px;
            font-size: 16px;
            border: none;
            font-size: 21px;
            border-radius: 5px;
        }

        .b1 {
            background-color: #B46060;
            color: #FFF;
            padding: 10px 15px;
            font-size: 16px;
            border: none;
            font-size: 21px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .b1:hover {
            background-color: #388087;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navigation">
            
            <div class="dropdown">
                <button onclick="toggleDropdown()" class="dropbtn">Profile</button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="Finalresult2.php">Result</a>
                    <a href="history.php">Search History</a>
                </div>
            </div>
        </nav>
    </header>
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search..">
        <button class="b1" id="searchButton" onclick="addToHistory()">Search</button>
    </div>
    <script>
        function addToHistory() {
            const searchInput = document.querySelector('.search-container input');
            const searchKeyword = searchInput.value.trim();

            if (searchKeyword !== '') {
                const historyGrid = document.querySelector('.history-grid');
                const historyItem = document.createElement('div');
                historyItem.classList.add('history-item');
                historyItem.textContent = searchKeyword;

                historyGrid.appendChild(historyItem);

                searchInput.value = '';
            }
        }
    </script>
    <script>
        function toggleDropdown() {
            var dropdownContent = document.getElementById("myDropdown");
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        }
    </script>
</body>
</html>
