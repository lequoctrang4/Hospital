<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xem thông tin bệnh nhân</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

  <div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <h4>Thông tin bệnh nhân
                <a href="?controller=patient&action=index" class="btn btn-danger float-end">Quay trở lại</a>
                </h4>
                </div>
                    <div class="card-body">
                        <div class="mb-3">
                        <label>ID</label>
                        <p class="form-control">
                            <?= $patient["PATIENT_ID"]; ?>
                        </p>
                        </div>
                        <div class="mb-3">
                        <label>Tên bệnh nhân</label>
                        <p class="form-control">
                            <?= $patient["FNAME"] . ' ' . $patient['LNAME']; ?>
                        </p>
                        </div>
                        <div class="mb-3">
                            <label>Ngày sinh</label>
                            <p class="form-control">
                                <?= str_replace('/','-' , date('d/m/Y', strtotime($patient["BDATE"]))); ?>
                            </p>                                
                        </div>
                        <div class="mb-3">
                            <label>Giới tính</label>
                            <p class="form-control">
                                <?= $patient["SEX"]; ?>
                            </p>                                
                        </div>
                        <div class="mb-3">
                            <label>Địa chỉ</label>
                            <p class="form-control">
                                <?= $patient["ADDRESS"]; ?>
                            </p>                                
                        </div>
                        <div class="mb-3">
                            <label>Số điện thoại</label>
                            <p class="form-control">
                                <?= $patient["PHONE_NUMBER"]; ?>
                            </p>                                
                        </div>
                        <div class="mb-3">
                            <label>Số bảo hiểm y tế</label>
                            <p class="form-control">
                                <?= $patient["H_I_N"]; ?>
                            </p>                                
                        </div>
                        <a href="?controller=treat&action=form&id=<?= $patient['PATIENT_ID']; ?>" class="btn btn-primary">Tạo hồ sơ khám bệnh</a>
                        <a href="?controller=treat&action=history&id=<?= $patient['PATIENT_ID']; ?>" class="btn btn-success">Lịch sử khám bệnh</a>
                </div>
            </div>
        </div>
    </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
  </body>
</html>