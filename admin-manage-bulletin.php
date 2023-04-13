<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      http-equiv="X-UA-Compatible"
      content="IE=edge"
    />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <title>Admin | Manage Bulletin</title>
    <link
      rel="stylesheet"
      href="./main.css"
    />
    <link
      rel="stylesheet"
      href="./css/admin-dashboard.css"
    />
    <link
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      rel="stylesheet"
    />
    <link
      rel="preconnect"
      href="https://fonts.googleapis.com"
    />
    <link
      rel="preconnect"
      href="https://fonts.googleapis.com"
    />
    <link
      rel="preconnect"
      href="https://fonts.googleapis.com"
    />
    <link
      rel="preconnect"
      href="https://fonts.gstatic.com"
      crossorigin
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700&family=Quicksand:wght@300;400;500;600;700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,400;1,500&display=swap"
      rel="stylesheet"
    />
    <style>
      .main-content {
        padding: 0 25px;
        color: #1d1d1f;
        margin-top: 15px;
      }
      .bulletin-header {
        display: flex;
        align-items: center;
      }
      .bulletin-header h1 {
        flex: 1;
      }
      .bulletin-header div {
        padding: 8px;
        background-color: transparent;
        border: 1px solid #dddddd;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
        transition: all 300ms ease;
      }
      .bulletin-header div:hover {
        transform: scale(1.1);
        background-color: #658fff;
      }
      .main-content table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        transition: all 300ms ease;
      }
      .main-content tr:hover {
        transform: scale(1);
        background-color: #658fff;
      }
      .main-content td,
      .main-content th {
        border: 1px solid #dddddd;
        padding: 8px;
      }
      .main-content td.center {
        text-align: center;
      }

      /* P A G I N A T I O N */
      .pagination {
        display: flex;
        justify-content: center;
        margin: 10px;
        transition: all 300ms ease;
      }
      .pagination a {
        color: black;
        padding: 8px 16px;
        text-decoration: none;
        border-radius: 10px;
      }
      .pagination a.active {
        background-color: #658fff;
        color: white;
        margin-left: 5px;
        margin-right: 5px;
      }
      .pagination a:hover:not(.active) {
        background-color: #ddd;
        transform: scale(1.1);
      }

      /* MODAL */
      /* The Modal (background) */
      .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 3; /* Sit on top */
        /* padding-top: 20px; Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0, 0, 0); /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
      }
      .modal-content {
        color: #1d1d1f;
        background-color: #fff;
        border-radius: 10px;
        width: 25%;
        margin: auto;
        display: flex;
        flex-direction: column;
        align-items: center;
      }
      .modal-header {
        display: flex;
        flex: 1;
        width: 90%;
        flex-direction: row;
        align-items: center;
      }
      .modal-body {
        display: flex;
        flex: 1;
        flex-direction: column;
        padding: 10px;
      }
      /* Add Animation */
      @-webkit-keyframes animatetop {
        from {
          top: -300px;
          opacity: 0;
        }
        to {
          top: 0;
          opacity: 1;
        }
      }
      @keyframes animatetop {
        from {
          top: -300px;
          opacity: 0;
        }
        to {
          top: 0;
          opacity: 1;
        }
      }
      /* The Close Button */
      span.close {
        color: #000;
        cursor: pointer;
        font-weight: bold;
      }
      .modal-body input {
        border: 1px solid #1d1d1f;
        border-radius: 4px;
        background-color: transparent;
        padding: 5px;
      }
      .modal-body div {
        margin: 5px;
        display: flex;
        flex-direction: column;
      }
      /* END OF MODAL */
    </style>
  </head>
  <body>
    <div class="container">
      <!-- side nav -->
      <nav class="side-nav">
        <h1 class="side-nav-title">Admin</h1>
        <div
          class="side-nav-item"
          title="Home"
        >
          <a
            href="#"
            class="side-nav-link"
          >
            <i class="fas fa-tachometer-alt"></i>
            Dashboard
          </a>
        </div>

        <div
          class="side-nav-item"
          title="Profile"
        >
          <a
            href="#"
            class="side-nav-link"
          >
            <i class="fas fa-calendar-plus"></i>
            Manage Bulletins
          </a>
        </div>

        <div
          class="side-nav-item"
          title="Message"
        >
          <a
            href="#"
            class="side-nav-link"
          >
            <i class="fas fa-comment-alt"></i>
            Message
          </a>
        </div>

        <div
          class="side-nav-item"
          title="LVCC Drive"
        >
          <a
            href="#"
            class="side-nav-link"
          >
            <i class="fas fa-ad"></i>
            Manage ADS
          </a>
        </div>

        <div
          class="side-nav-item"
          title="Users"
        >
          <a
            href="#"
            class="side-nav-link"
          >
            <i class="fas fa-users-cog"></i>
            Connected Users
          </a>
        </div>

        <a href=""
          ><i
            class="fas fa-sign-out-alt fa-lg"
            title="Log Out"
          ></i
        ></a>
      </nav>

      <main class="main-content">
        <div class="bulletin-header">
          <h1>Manage Bulletin</h1>
          <!-- Trigger/Open The Modal -->
          <div
            class="add-new-event-modal"
            href="#addNewEventModal"
          >
            <i class="fas fa-plus"></i> Add New Event
          </div>
        </div>
        <table>
          <tr>
            <th>No.</th>
            <th>Event</th>
            <th>Participants</th>
            <th>Date</th>
            <th>Location</th>
            <th width="75px">Action</th>
          </tr>
          <tr>
            <td class="center">1</td>
            <td>ICT Week 2023</td>
            <td>ICT Majors from Grade 9 to College</td>
            <td>April 10-15, 2023</td>
            <td>LVCC Auditorium Lobby</td>
            <td class="center">
              <i class="fas fa-eye"></i> <i class="fas fa-edit"></i>
              <i class="fas fa-trash"></i>
            </td>
          </tr>
          <tr>
            <td class="center">2</td>
            <td>Midterm Exam</td>
            <td>College Students</td>
            <td>April 17-22, 2023</td>
            <td>Respective Classrooms</td>
            <td class="center">
              <i class="fas fa-eye"></i> <i class="fas fa-edit"></i>
              <i class="fas fa-trash"></i>
            </td>
          </tr>
          <tr>
            <td class="center">3</td>
            <td>4th General Zoomustahan</td>
            <td>College Students</td>
            <td>June 1, 2023</td>
            <td>Zoom Video Conference</td>
            <td class="center">
              <i class="fas fa-eye"></i> <i class="fas fa-edit"></i>
              <i class="fas fa-trash"></i>
            </td>
          </tr>
          <tr>
            <td class="center">4</td>
            <td>Final Exam</td>
            <td>College Students</td>
            <td>June 19-25, 2023</td>
            <td>Respective Classrooms</td>
            <td class="center">
              <i class="fas fa-eye"></i> <i class="fas fa-edit"></i>
              <i class="fas fa-trash"></i>
            </td>
          </tr>
          <tr>
            <td class="center">5</td>
            <td>Removal Examination</td>
            <td>To be posted</td>
            <td>July 7, 2023</td>
            <td>To be announced</td>
            <td class="center">
              <i class="fas fa-eye"></i> <i class="fas fa-edit"></i>
              <i class="fas fa-trash"></i>
            </td>
          </tr>
          <tr>
            <td class="center">6</td>
            <td>Posting of Official List of Candidates for Graduation</td>
            <td>Graduating Students</td>
            <td>July 7, 2023</td>
            <td>Group Chat</td>
            <td class="center">
              <i class="fas fa-eye"></i> <i class="fas fa-edit"></i>
              <i class="fas fa-trash"></i>
            </td>
          </tr>
          <tr>
            <td class="center">7</td>
            <td>Signing of Application for Graduation</td>
            <td>Graduating Students</td>
            <td>July 10-14, 2023</td>
            <td>To be announced</td>
            <td class="center">
              <i class="fas fa-eye"></i> <i class="fas fa-edit"></i>
              <i class="fas fa-trash"></i>
            </td>
          </tr>
          <tr>
            <td class="center">8</td>
            <td>Graduation Rehearsal</td>
            <td>Graduating Students</td>
            <td>July 19, 2023</td>
            <td>LVCC Auditorium</td>
            <td class="center">
              <i class="fas fa-eye"></i> <i class="fas fa-edit"></i>
              <i class="fas fa-trash"></i>
            </td>
          </tr>
          <tr>
            <td class="number">9</td>
            <td>Distribution of Togas, Ribbons and Invitation</td>
            <td>Graduating Students</td>
            <td>July 19, 2023</td>
            <td>LVCC Auditorium Lobby</td>
            <td class="center">
              <i class="fas fa-eye"></i> <i class="fas fa-edit"></i>
              <i class="fas fa-trash"></i>
            </td>
          </tr>
          <tr>
            <td class="number">10</td>
            <td>Commencement Exercises</td>
            <td>Graduating Students</td>
            <td>July 20, 2023</td>
            <td>LVCC Auditorium</td>
            <td class="center">
              <i class="fas fa-eye"></i> <i class="fas fa-edit"></i>
              <i class="fas fa-trash"></i>
            </td>
          </tr>
        </table>
        <div class="pagination">
          <a href="#">&laquo;</a>
          <a
            class="active"
            href="#"
            >1</a
          >
          <a href="#">2</a>
          <a href="#">3</a>
          <a href="#">&raquo;</a>
        </div>
      </main>

      <div class="right-nav">
        <a href=""><i class="fas fa-bell"></i></a>
        <div class="admin-profile">
          <img
            src="./images/setting.png"
            alt=""
            class="admin-image"
          />
          <h2 class="admin-name">Admin Brian</h2>
        </div>
        <a href=""
          ><i
            class="fas fa-cog fa-lg"
            title="Setting"
          ></i
        ></a>
      </div>
    </div>

    <!-- The Add New Applicant Modal -->
    <div
      id="addNewEventModal"
      class="modal"
    >
      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <div style="flex: 1; text-align: center">
            <h3>Add New Event</h3>
          </div>
          <div>
            <span class="close">&times;</span>
          </div>
        </div>

        <form
          action=""
          method="POST"
        >
          <div class="modal-body">
            <div>
              <label for="">Event</label>
              <input
                type="text"
                name=""
                id=""
              />
            </div>

            <div>
              <label for="">Participants</label>
              <input
                type="text"
                name=""
                id=""
              />
            </div>
            <div>
              <label for="">Date</label>
              <input
                type="date"
                name=""
                id=""
              />
            </div>
            <div>
              <label for="">Location</label>
              <input
                type="text"
                name=""
                id=""
              />
            </div>
            <button type="submit">Add</button>
          </div>
        </form>
      </div>
    </div>

    <script>
      // Get the div that opens the modal
      var div = document.querySelectorAll('div.add-new-event-modal');
      // All page modals
      var modals = document.querySelectorAll('.modal');
      // Get the <span> element that closes the modal
      var spans = document.getElementsByClassName('close');
      // When the user clicks the div, open the modal
      for (var i = 0; i < div.length; i++) {
        div[i].onclick = function (e) {
          e.preventDefault();
          modal = document.querySelector(e.target.getAttribute('href'));
          modal.style.display = 'flex';
        };
      }
      // When the user clicks on <span> (x), close the modal
      for (var i = 0; i < spans.length; i++) {
        spans[i].onclick = function () {
          for (var index in modals) {
            if (typeof modals[index].style !== 'undefined') modals[index].style.display = 'none';
          }
        };
      }
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function (event) {
        if (event.target.classList.contains('modal')) {
          for (var index in modals) {
            if (typeof modals[index].style !== 'undefined') modals[index].style.display = 'none';
          }
        }
      };
    </script>
  </body>
</html>
