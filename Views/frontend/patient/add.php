<?php
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thêm bệnh nhân</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

  <div class="container mt-5">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4>Thêm bệnh nhân
                  <a href="?controller=patient&action=index" class="btn btn-danger float-end">Quay trở lại</a>
                </h4>
              </div>
              <div class="card-body">
                <form action="?controller=patient&action=store" method="POST">
                  <div class="mb-3">
                    <label>Họ và tên đệm</label>
                    <input type="text" name="fname" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label>Tên</label>
                    <input type="text" name="lname" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label>Ngày, tháng, năm, sinh</label>
                    <input type="date" name="bdate" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label>Địa chỉ</label>
                    <input type="text" name="address" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label>Giới tính</label>
                    <input name="sex" type="radio" value="Nam"/>Nam
                    <input name="sex" type="radio" value="Nữ"/>Nữ
                  </div>
                  <div class="mb-3">
                    <label>Số điện thoại</label>
                    <input type="text" name="phone" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label>Số Bảo hiểm y tế</label>
                    <input type="text" name="hin" class="form-control">
                  </div>
                  <div class="mb-3">
                    <button type="submit" name="save_patient" class="btn btn-primary">Lưu bệnh nhân</button>
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