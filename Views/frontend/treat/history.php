<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo hồ sơ khám</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
        <div class="row"></div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Lịch sử khám bệnh của bệnh nhân <?= $name;?>
                    <a href="?controller=patient&action=views&id=<?= $_REQUEST['id'];?>" class="btn btn-danger float-end">Quay trở lại</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Mã số hồ sơ</th>
                                <th>Mã số bệnh nhân</th>
                                <th>Mã số bác sĩ</th>
                                <th>Dấu hiệu bệnh</th></th>
                                <th>Ngày khám</th>
                                <th>Kết luận của bác sĩ</th>
                                <th>Giá tiền</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($treat as $data) {
                            ?>
                            <tr>
                                <td><?= $data['DOCU_ID']; ?></td>
                                <td><?= $data['PATIENT_ID']; ?></td>
                                <td><?= $data['S_ID']; ?></td>
                                <td><?= $data['DISEASE']; ?></td>
                                <td><?= str_replace('/','-' , date('d/m/Y', strtotime($data["DATE_TREAT"]))); ?></td>
                                <td><?= $data['DIAGNOSTIC']; ?></td>
                                <td><?= $data['PRICE']; ?></td>
                                <td>
                                    <a href="?controller=treat&action=views&id=<?= $data['DOCU_ID']; ?>" class="btn btn-success btn-sm">Xem</a>
                                    <a href="?controller=treat&action=edit&id=<?= $data['DOCU_ID']; ?>" class="btn btn-success btn-sm">Chỉnh sửa</a>
                                    <form action="?controller=treat&action=store" method="POST" class="d-inline">
                                        <button type="submit" name="delete_treat" value="<?= $data['DOCU_ID']; ?>" class="btn btn-danger btn-sm">Xóa</button>
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