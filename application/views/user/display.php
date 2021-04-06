<!DOCTYPE html>
<html>

    <head>
        <title>Display Records</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
    </head>

    <body>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Sr No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                </tr>
                <?php
  $i=1;
  foreach($data as $row)
  {

  echo "<tr>";
  echo "<td>".$i."</td>";
  echo "<td>".$row->firstname."</td>";
  echo "<td>".$row->lastname."</td>";
  echo "<td>".$row->email."</td>";
  echo "<td><a href='deletedata?id=".$row->userid."'>Delete</a></td>";
  echo "<td><a href='updatedata?id=".$row->userid."'>Edit</a></td>";
  echo "</tr>";
  $i++;
  }
   ?>
        </table>
        </tbody>
        </table>


    </body>

</html>
