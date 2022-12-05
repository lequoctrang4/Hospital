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
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4>Tạo hồ sơ khám bệnh
                  <a href="?controller=patient&action=views&id=<?= $patient['PATIENT_ID']; ?>" class="btn btn-danger float-end">Quay trở lại</a>
                </h4>
              </div>
              <div class="card-body">
                <form action="?controller=treat&action=store" method="POST">
                  <div class="mb-3">
                    <label>Số hồ sơ</label>
                    <p class="form-control">
                            <?= $patient["PATIENT_ID"]; ?>
                    </p>
                    <input type="text" name="patient_id" value="<?= $patient["PATIENT_ID"]; ?>" class="form-control" style="display:none">
                  </div>
                  <div class="mb-3">
                    <label>Họ và tên bệnh nhân</label>
                    <p class="form-control">
                            <?= $patient["FNAME"] . ' ' . $patient['LNAME']; ?>
                    </p>
                  </div>
                  <div class="mb-3">
                    <label>Thông tin bệnh</label>
                    <input type="text" name="diease" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label>Bác sĩ khám</label>
                    <input type="text" name="s_name" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label>Chẩn đoán của bác sĩ</label>
                    <input type="text" name="diagnostic" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label>Lệ phí</label>
                    <input type="text" name="price" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label>Tòa</label>
                    <input type="text" name="buil_id" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label>Phòng</label>
                    <input type="text" name="room_id" class="form-control">
                  </div>
                  <div class="mb-3">
                    <button type="submit" name="save_treat" class="btn btn-primary">Lưu hồ sơ</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>