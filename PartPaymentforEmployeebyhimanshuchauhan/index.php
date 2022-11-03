<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Part Payment for Employee:</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body >
  <div id="main">
   
  <div id="table-data">
        <h3>All Records</h3>
        <table border="1" width="100%" cellspacing="0" cellpadding="10px">
            <thead>
                <tr>
                    <th width="60px">Id</th>
                    <th>Employee</th>
                    <th>Total Amount</th>
                    <th>Due</th>
                    <th>Paid</th>
                    <th width="90px">Action</th>
                </tr>
            </thead>
            <tbody id="tbody"></tbody>
        </table>
    </div>

    <div id="error-message"></div>
    <div id="success-message"></div>
    </div>


  <!-- modal for show add new -->
  <div id="addModal">
    <div id="modal-form" > 
      <div id="close-btn" onclick="hide_modal()">X</div>
    </div>
  </div>

  <!-- modal for show edit -->
  <div id="modal">
    <div id="modal-form">
      <h2>Pay!!!</h2>
      <form method="POST" name="">
        <table cellpadding="10px" width="100%" id="edit-form">
          <tr>
            <td>
                <input type='text' id='edit-id' hidden>
            </td>
          </tr>
          <tr>
            <td>Employee Name</td>
            <td>
                <input type='text' id='edit-employee' >
            </td>
          </tr>
          <tr>
          <td>Total Amount</td>
            <td>
                <input type='text' id='edit-totalamount' disabled >
            </td>
          </tr>
          <tr>
          <td>Due Amount</td>
            <td>
                <input type='text' id='edit-due' disabled>
            </td>
          </tr>
          <tr>
          <td>Paid Amount</td>
            <td>
                <input type='text' id='edit-paid' disabled>
            </td>
          </tr>
          <tr>
          <td>Amount to be paid</td>
            <td>
                <input type='text' id='edit-sum' >
            </td>
          </tr>
          <tr>
          <td><button type="button" class="delete-btn" id="pay" onclick='modify_data()' id='edit-submit'>Pay</button></td>
          </tr>
        </table>
      </form>
      <div id="close-btn" onclick="hide_modal()">X</div>
    </div>
  </div>

  
<script type="text/javascript" src="js/fetch.js"></script>
</body>
</html>
