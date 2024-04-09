<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NMU Room of Deposits</title>
    <style>
        body {
            background-image: url('t-7.jpg');
            background-color: #fff;
            background-size: cover;
            background-repeat: no-repeat;
            color: #333;
            font-family: 'Arial', sans-serif;
            margin: 20px;
            text-align: center;
            font-weight: bold;
            padding: 20px;
        }

        header img {
            width: 200px;
            height: auto;
            display: block;
            margin: 0 auto;
            border: 2px solid #93191f;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border: 2px solid #93191f;
            border-radius: 10px;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #333;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #93191f;
            color: white;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }

        #studentList {
            max-width: 800px;
            margin: 20px auto;
            overflow-y: auto;
            max-height: 500px;
            display: none;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border: 2px solid #93191f;
            border-radius: 10px;
        }

        #studentList table {
            width: 100%;
        }

        #studentList th,
        #studentList td {
            padding: 10px;
            text-align: center;
        }

        #studentList th {
            background-color: #93191f;
            color: white;
        }

        #studentList img {
            width: 50px;
            height: auto;
            cursor: pointer;
        }

        #toggleButton {
            background-color: #93191f;
            color: white;
            cursor: pointer;
            padding: 8px;
            margin: 10px;
            border: none;
            border-radius: 5px;
        }

        .deleteButton {
            background-color: #ff0000;
            color: white;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        #studentList img {
            width: 50px;
            height: auto;
            cursor: pointer;
        }

        #fullscreenImage {
            display: none;
            position: fixed;
            z-index: 2;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            overflow: auto;
        }

        #fullscreenContent {
            position: relative;
            margin: auto;
            width: 80%;
            max-width: 800px;
            margin-top: 30px;
            top: 50%;
            transform: translateY(-50%);
        }

        #fullscreenImage img {
            display: block;
            margin: auto;
            max-width: 100%;
            max-height: 50vh;
        }
    </style>
</head>

<body>
    <header>
        <img src="MN.png" alt="Placeholder Image">
    </header>

    <h2>Deposit Form</h2>
    <form id="registrationForm" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" pattern="[A-Za-z ]+" title="Please enter only letters" required>

        <label for="faculty">Faculty:</label>
        <select id="faculty" name="faculty" required> 
            <option value="" disabled selected>Select your faculty</option>
            <option value="Computer Science & Engineering">Computer Science & Engineering</option>
            <option value="Engineering">Engineering</option>
            <option value="Science">Science</option>
            <option value="International Legal Transactions">International Legal Transactions</option>
            <option value="Textile Science & Engineering ">Textile Science & Engineering </option>
            <option value="Dentistry">Dentistry</option>
            <option value="Doctor Of Pharmacy (PharmD) ">Doctor Of Pharmacy (PharmD) </option>
            <option value="Business">Business</option>
            <option value="Medicine & Surgery">Medicine & Surgery</option>
            
        </select>

        <label for="studentId">Student ID:</label>
        <input type="text" id="studentId" name="studentId" pattern="\d{9}" title="Please enter 9 numbers" required>

        <label for="phoneNumber">Phone Number:</label>
        <input type="text" id="phoneNumber" name="phoneNumber" pattern="\d{11}" title="Please enter 11 numbers"
            required>

        <label for="picture">Upload Picture (Bag) :</label>
        <input type="file" id="picture" name="picture" accept="image/png, image/jpeg, image/jpg" required>

        <input type="submit" value="Submit">
    </form>

    <button id="toggleButton" onclick="showPasswordBox()">Show Student List</button>

    <div id="passwordBox" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closePasswordBox()">&times;</span>
            <label for="password">Enter Password:</label>
            <input type="password" id="password" name="password" required>
            <button id="submitPassword" onclick="checkPassword()">Submit</button>
        </div>
    </div>

    <div id="studentList">
        <input type="text" id="searchBar" oninput="searchStudents()" placeholder="Search by name or ID">
        <select id="collegeFilter" onchange="filterStudents()">
            <option value="all">All</option>
            <option value="Computer Science & Engineering">Computer Science & Engineering</option>
            <option value="Engineering">Engineering</option>
            <option value="Science">Science</option>
            <option value="International Legal Transactions">International Legal Transactions</option>
            <option value="Textile Science & Engineering ">Textile Science & Engineering </option>
            <option value="Dentistry">Dentistry</option>
            <option value="Doctor Of Pharmacy (PharmD) ">Doctor Of Pharmacy (PharmD) </option>
            <option value="Business">Business</option>
            <option value="Medicine & Surgery">Medicine & Surgery</option>
        </select>
        <table>
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Student Name</th>
                    <th>Student ID</th>
                    <th>Phone Number</th>
                    <th>Faculty</th>
                    <th>Picture of the Bag</th>
                    <th>Time & Date</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody id="studentTableBody"></tbody>
        </table>
    </div>
    <div id="fullscreenImage" onclick="closeFullscreen()">
        <div id="fullscreenContent">
            <img id="fullscreenImg" src="" alt="Fullscreen Image">
        </div>
    </div>

    <script>
        class Node {
            constructor(data) {
                this.data = data;
                this.next = null;
            }
        }

        class LinkedList {
            constructor() {
                this.head = null;
                this.counter = 1;
            }

            addStudent(student) {
                student.serial = this.counter++;
                const newNode = new Node(student);
                if (!this.head) {
                    this.head = newNode;
                } else {
                    let current = this.head;
                    while (current.next) {
                        current = current.next;
                    }
                    current.next = newNode;
                }
            }

            deleteStudent(index) {
                if (this.head === null) {
                    return;
                }

                if (index === 0) {
                    this.head = this.head.next;
                } else {
                    let current = this.head;
                    let count = 0;
                    let prev = null;
                    while (count < index) {
                        prev = current;
                        current = current.next;
                        count++;
                    }

                    if (current === null) {
                        return;
                    }

                    prev.next = current.next;
                }
            }

            filter(filterFunction) {
                let current = this.head;
                const result = new LinkedList();

                while (current !== null) {
                    if (filterFunction(current.data)) {
                        result.addStudent(current.data);
                    }

                    current = current.next;
                }

                return result;
            }

            search(searchTerm, selectedFaculty) {
                return this.filter(function (student) {
                    return (
                        (student.name.toLowerCase().includes(searchTerm) || student.studentId.includes(searchTerm)) &&
                        (selectedFaculty === "all" || student.faculty === selectedFaculty)
                    );
                });
            }
        }

        var studentList = new LinkedList();
        var isStudentListVisible = false;

        document.getElementById("registrationForm").addEventListener("submit", function (event) {
            event.preventDefault();

            var name = document.getElementById("name").value;
            var faculty = document.getElementById("faculty").value;
            var studentId = document.getElementById("studentId").value;
            var phoneNumber = document.getElementById("phoneNumber").value;
            var picture = document.getElementById("picture").files[0];

            var student = {
                name: name,
                faculty: faculty,
                studentId: studentId,
                phoneNumber: phoneNumber,
                picture: picture
            };

            studentList.addStudent(student);
            displayStudentList();

            document.getElementById("name").value = "";
            document.getElementById("faculty").value = "";
            document.getElementById("studentId").value = "";
            document.getElementById("phoneNumber").value = "";
            document.getElementById("picture").value = "";
        });

        function displayStudentList() {
            var tableBody = document.getElementById("studentTableBody");
            tableBody.innerHTML = "";

            let current = studentList.head;
            let index = 1;
            while (current !== null) {
                var student = current.data;

                var row = tableBody.insertRow();
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                var cell6 = row.insertCell(5);
                var cell7 = row.insertCell(6);
                var cell8 = row.insertCell(7);

                cell1.innerHTML = index++;
                cell2.innerHTML = student.name;
                cell3.innerHTML = student.studentId;
                cell4.innerHTML = student.phoneNumber;
                cell5.innerHTML = student.faculty;
                cell6.innerHTML = `<img src="${URL.createObjectURL(student.picture)}" alt="" style="width:50px; height:auto;" onclick="showFullImage('${URL.createObjectURL(student.picture)}')">`;
                cell7.innerHTML = new Date().toLocaleString();

                cell8.innerHTML = `<button class="deleteButton" onclick="deleteStudent(${index - 2})">Delete</button>`;

                current = current.next;
            }
        }

        function deleteStudent(index) {
            studentList.deleteStudent(index);
            displayStudentList();
        }

        function showFullImage(imageUrl) {
            var fullscreenImage = document.getElementById("fullscreenImage");
            var fullscreenImg = document.getElementById("fullscreenImg");

            fullscreenImg.src = imageUrl;
            fullscreenImage.style.display = "block";
        }

        function closeFullscreen() {
            var fullscreenImage = document.getElementById("fullscreenImage");
            fullscreenImage.style.display = "none";
        }

        function showStudentList() {
            var studentListContainer = document.getElementById("studentList");
            studentListContainer.style.display = "block";
            displayStudentList();
            isStudentListVisible = true;
        }

        function closeStudentList() {
            var studentListContainer = document.getElementById("studentList");
            studentListContainer.style.display = "none";
            isStudentListVisible = false;
        }

        function showPasswordBox() {
            var passwordBox = document.getElementById("passwordBox");

            if (isStudentListVisible) {
                closeStudentList();
            } else {
                passwordBox.style.display = "block";
            }
        }

        function closePasswordBox() {
            var passwordBox = document.getElementById("passwordBox");
            passwordBox.style.display = "none";
        }

        function checkPassword() {
            var password = document.getElementById("password").value;

            if (password === "00000") {
                closePasswordBox();
                isStudentListVisible ? closeStudentList() : showStudentList();
            } else {
                alert("Incorrect password. Please try again.");
            }
        }

        function filterStudents() {
            var selectedFaculty = document.getElementById("collegeFilter").value;
            var filteredStudents;

            if (selectedFaculty !== "all") {
                filteredStudents = studentList.filter(function (student) {
                    return student.faculty === selectedFaculty;
                });
            } else {
                filteredStudents = studentList;
            }

            displayFilteredStudents(filteredStudents);
        }

        function displayFilteredStudents(filteredStudents) {
            var tableBody = document.getElementById("studentTableBody");
            tableBody.innerHTML = "";

            let index = 1;
            let current = filteredStudents.head;
            while (current !== null) {
                var student = current.data;

                var row = tableBody.insertRow();
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                var cell6 = row.insertCell(5);
                var cell7 = row.insertCell(6);
                var cell8 = row.insertCell(7);

                cell1.innerHTML = index++;
                cell2.innerHTML = student.name;
                cell3.innerHTML = student.studentId;
                cell4.innerHTML = student.phoneNumber;
                cell5.innerHTML = student.faculty;
                cell6.innerHTML = `<img src="${URL.createObjectURL(student.picture)}" alt="" style="width:50px; height:auto;" onclick="showFullImage('${URL.createObjectURL(student.picture)}')">`;
                cell7.innerHTML = new Date().toLocaleString();

                cell8.innerHTML = `<button class="deleteButton" onclick="deleteStudent(${index - 2})">Delete</button>`;

                current = current.next;
            }
        }

        function searchStudents() {
            var searchTerm = document.getElementById("searchBar").value.toLowerCase();
            var selectedFaculty = document.getElementById("collegeFilter").value;

            var filteredStudents = studentList.search(searchTerm, selectedFaculty);
            displayFilteredStudents(filteredStudents);
        }
    </script>
</body>

</html>