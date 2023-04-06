<?php

    require_once '../config/database.php';
    require_once 'auth.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="logo.png">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="dist/bootstrap-4.2.1/css/bootstrap.min.css">

        <!-- For Icon -->
        <link rel="stylesheet" href="dist/fontawesome-6.3.0/css/all.min.css">

        <title>Technicals | CRUD</title>

    </head>
    <body style="background-color: black">
        <!-- Modal -->
        <!-- ADD POP UP FORM (Bootstrap MODAL) -->
        <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Data </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="technicals_operation.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label> Number </label>
                                <input type="number" name="number" class="form-control" placeholder="Enter Number" min="1" max="256" autocomplete="off" required>
                            </div>

                            <div class="form-group">
                                <label> Name </label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name" autocomplete="off" required>
                            </div>

                            <div class="form-group">
                                <label for="avatar">Avatar</label>
                                <input type="file" name="avatar" id="avatar" class="form-control" accept="image/*">
                                <small class="form-text text-muted">Select an image file to upload.</small>
                            </div>

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" pattern="[a-zA-Z0-9]+" class="form-control" placeholder="Enter Username" autocomplete="off" required>
                            </div>

                            <div class="form-group">
                                <label> Password </label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" placeholder="Enter Password" autocomplete="off" pattern="^(?=.*[a-zA-Z])(?=.*\d).+$" required>
                                    <button type="button" class="btn btn-secondary toggle-password" data-toggle="tooltip" data-placement="bottom" title="Toggle password visibility"><i class="fas fa-eye"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Edit Data </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="technicals_operation.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="update_id" id="update_id">
                            <div class="form-group">
                                <label> Number </label>
                                <input type="number" name="number" id="number" class="form-control" placeholder="Enter Number" min="1" max="256" autocomplete="off" required>
                            </div>

                            <div class="form-group">
                                <label> Name </label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" autocomplete="off" required>
                            </div>

                            <div class="form-group">
                                <label for="avatar">Avatar</label>
                                <input type="file" name="avatar" id="avatar" class="form-control" accept="image/*">
                                <small class="form-text text-muted">Select an image file to upload.</small>
                            </div>

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" id="username" pattern="[a-zA-Z0-9]+" class="form-control" placeholder="Enter Username" autocomplete="off" required>
                            </div>

                            <div class="form-group">
                                <label> Password </label>
                                <div class="input-group">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" autocomplete="off" pattern="^(?=.*[a-zA-Z])(?=.*\d).+$" required>
                                    <button type="button" class="btn btn-secondary toggle-password" data-toggle="tooltip" data-placement="bottom" title="Toggle password visibility"><i class="fas fa-eye"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
        <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Delete Data </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="technicals_operation.php" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="delete_id" id="delete_id">
                            <h4> Do you want to Delete this Data ??</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal"> NO </button>
                            <button type="submit" name="deletedata" class="btn btn-danger"> Yes !! Delete it. </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sign Out POP UP Form (Bootstrap MODAL) -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sign Out</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="signout">
                            <h4> Are you sure you want to Sign Out??</h4>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <a class="btn btn-danger" href="logout.php" role="button">Yes</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container my-4">
            <h1 class="text-center text-light"><b> <u>Technicals</u> </b></h1>
            <div class="d-flex align-items-center mr-3 my-3">
                <div class="btn-group" role="group" aria-label="Go to">
                    <select onchange="window.location.href=this.value" class="btn btn-secondary">
                        <option value="competitions.php">Competitions</option>
                        <option value="categories.php">Categories</option>
                        <option value="events.php">Events</option>
                        <option value="criteria.php">Criterion</option>
                        <option value="teams.php">Teams</option>
                        <option value="judges.php">Judges</option>
                        <option selected value="">Technicals</option>
                    </select>
                </div>
                <div class="btn-group ml-auto" role="group" aria-label="Go to">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmodal">ADD DATA</button>
                </div>
                <div class="btn-group ml-3" role="group" aria-label="Go to">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                        Sign out <i class="fa-solid fa-right-from-bracket"></i>
                    </button>
                </div>
            </div>
            <?php
                require_once '../models/Technical.php';

                $technicals = Technical::all();
            ?>
            <table id="datatableid" class="table table-striped table-info text-center">
                <thead class="table-dark">
                <tr>
                    <th scope="col" style="display:none;">ID</th>
                    <th scope="col">Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Username</th>
                    <th scope="col" class="d-none">Password</th>
                    <th scope="col">Operations</th>
                </tr>
                </thead>
                <tbody class="table-dark">
                <?php foreach ($technicals as $technical) { ?>
                    <tr>
                        <td style="display:none;"><?php echo $technical->getId(); ?></td>
                        <td><?php echo $technical->getNumber(); ?></td>
                        <td><?php echo $technical->getName(); ?></td>
                        <td><?php echo '<img src="uploads/'.$technical->getAvatar().'" width="50"/>'; ?></td>
                        <td><?php echo $technical->getUsername(); ?></td>
                        <td class="d-none"><?php echo $technical->getPassword(); ?></td>
                        <td>
                            <button type="button" class="btn btn-success editbtn"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" class="btn btn-danger deletebtn" data-id="<?php echo $technical->getId(); ?>"><i class="fa-solid fa-trash-can"></i></button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Bootstrap Javascript -->
        <script src="dist/jquery-3.6.4/jquery-3.6.4.min.js"></script>
        <script src="dist/bootstrap-4.2.1/js/bootstrap.min.js"></script>

        <script src="main.js"></script>

        <script>
            $(document).ready(function () {

                $('.editbtn').on('click', function () {

                    $('#editmodal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#update_id').val(data[0]);
                    $('#number').val(data[1]);
                    $('#name').val(data[2]);
                    $('#avatar').val(data[3]);
                    $('#username').val(data[4]);
                    $('#password').val(data[5]);

                });
            });

            $(document).ready(function() {
                $('.toggle-password').click(function() {
                    var input = $(this).parent().find('input');
                    if (input.attr('type') === 'password') {
                        input.attr('type', 'text');
                        $(this).html('<i class="fas fa-eye-slash"></i>');
                        $(this).attr('title', 'Hide password');
                    } else {
                        input.attr('type', 'password');
                        $(this).html('<i class="fas fa-eye"></i>');
                        $(this).attr('title', 'Show password');
                    }
                });
            });
        </script>
    </body>
</html>
