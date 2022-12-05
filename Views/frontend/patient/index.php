<?php
?>
<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bệnh nhân</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row"></div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Danh sách bệnh nhân
                        <a href="?controller=patient&action=add" class="btn btn-primary float-end">Thêm bệnh nhân</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Họ và tên</th>
                                <th>Số BHYT</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($Patient as $data) {
                            ?>
                            <tr>
                                <td><?= $data['PATIENT_ID']; ?></td>
                                <td><?= $data['FNAME'] . ' ' . $data['LNAME']; ?></td>
                                <td><?= $data['H_I_N']; ?></td>
                                <td><?= $data['SEX']; ?></td>
                                <td><?= str_replace('/','-' , date('d/m/Y', strtotime($data["BDATE"]))); ?></td>
                                <td>
                                    <a href="?controller=patient&action=views&id=<?= $data['PATIENT_ID']; ?>" class="btn btn-success btn-sm">Xem</a>
                                    <a href="?controller=patient&action=edit&id=<?= $data['PATIENT_ID']; ?>" class="btn btn-success btn-sm">Chỉnh sửa</a>
                                    <form action="?controller=patient&action=store" method="POST" class="d-inline">
                                        <button type="submit" name="delete_patient" value="<?= $data['PATIENT_ID'];?>" class="btn btn-danger btn-sm">Xóa</button>
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