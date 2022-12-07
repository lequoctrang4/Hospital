
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phòng khám bệnh</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
        <div class="row"></div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Danh sách phòng khám bệnh
                        <a href="?controller=clinic&action=add" class="btn btn-primary float-end">Thêm phòng khám bệnh</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Tòa nhà</th>
                                <th>Phòng</th>
                                <th>Tên phòng</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($clinic as $data) {
                            ?>
                            <tr>
                                <td><?= $data['BUIL_ID']; ?></td>
                                <td><?= $data['ROOM_ID']; ?></td>
                                <td><?= $data['CLI_NAME']; ?></td>
                                <td>
                                    <a href="?controller=doctor&action=views&buil_id=<?= $data['BUIL_ID']; ?>&room_id=<?=$data['ROOM_ID'];?>" class="btn btn-success btn-sm ">Chỉnh sửa</a>
                                    <form action="?controller=doctor&action=store" method="POST" class="d-inline">
                                        <button type="submit" name="delete_doctor" value="" class="btn btn-danger btn-sm">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }    
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
</body>
</html>