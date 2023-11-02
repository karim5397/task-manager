<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body{
            background-color: #eae8e8;
        }
        .main-head{
            background: #fff;
            padding:15px;
            border-radius: 6px;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div class="task-manager">
        <div class="container">
            <div class="row">
                <div class="col-md-12 my-3">
                    <div class="main-head">
                        <h3>Task Manager List</h3>
                    </div>
                </div>
                <div class="col-md-12 my-3">
                    <div class="card">
                        
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <th>Title</th>
                                    <th>Due Date</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @forelse ($tasks as $task)
                                        
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="3"><p class="text-danger">No data found</p></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>