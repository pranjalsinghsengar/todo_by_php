<!DOCTYPE html>
<html lang="en">

<head>
  <title>Todo List</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
  <nav>
    <a class="heading" href="#">ToDo App</a>
  </nav>
  <div class="container">
    <div class="input-area">
      <form method="POST" action="./actions/insert.php">
        <input type="text" name="list" placeholder="write your tasks here..." required />
        <button class="btn" name="add">
          Add Task
        </button>
      </form>
    </div>


    <!-- GET_DATA -->
    <?php
    include "./config/config.php";
    $rawData = mysqli_query($con, "SELECT * FROM `table-todo`")
    ?>


    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th class="" style="text-align: left; width: 100%;">Tasks</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_array($rawData)) {
        ?>
          <tr>
            <td><?php echo $row['id'] ?> </td>
            <td id="listContainer">
              <span>


                <button class="" onclick="openInput(<?php echo $row['id'] ?>)" id="textShowContainer_<?php echo $row['id'] ?>" style=" border: none;cursor: pointer;">
                  <?php echo $row['list'] ?>
                </button>
                <form method="POST" action="actions/update.php" id="inputForm_<?php echo $row['id'] ?>" style="display: none; ">
                  <div style="display: flex;">

                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="text" name="updateList" placeholder="Update your tasks here..." />
                    <button> Update </button>
                  </div>

                </form>
              </span>
            </td>



            <td id="del"> <a href="actions/delele.php? ID=<?php echo $row['id'] ?>"> delete </a></td>
            <!-- <td onclick="updateTask(<?php echo $row['id']; ?>)"> <a href="actions/update.php? ID=<?php echo $row['id'] ?> ">Update </a></td> -->


          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <script>
    let del = document.getElementById("del");

    function openInput(id) {
      // var inputUpdate = document.getElementById("input_update_" + id);
      let inputForm = document.getElementById("inputForm_" + id);

      inputForm.style.display = "block";
      del.style.display = "none";
    }

    // function updateTask(id) {
    //   var updatedList = document.getElementById("input_update_" + id).value.trim()
    //   if (updatedList === "") {
    //     alert("Please enter a valid task.");
    //     return;
    //   } else return updatedList
    // }
  </script>
</body>

</html>