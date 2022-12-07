
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm bác sĩ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4>Thêm bác sĩ
                  <a href="?controller=doctor&action=index" class="btn btn-danger float-end">Quay trở lại</a>
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
                    <label>Mã số bác sĩ</label>
                    <input type="text" name="S_ID" class="form-control" style="width: 20%">
                  </div>
                  <div class="mb-3">
                    <label>Ngày, tháng, năm, sinh</label>
                    <input type="date" name="bdate" class="form-control" style="width: 20%">
                  </div>
                  <div class="mb-3">
                    <label>Giới tính</label>
                    <input name="sex" type="radio" value="Nam"/>Nam
                    <input name="sex" type="radio" value="Nữ"/>Nữ
                  </div>
                  <div class="mb-3">
                    <label>Địa chỉ</label>
                    <input type="text" name="address" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label>Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" style="width: 20%">
                  </div>
                  <div class="mb-3">
                    <label>Email</label>
                    <input type="mail" name="email" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label>Lương</label>
                    <input type="text" name="salary" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label>Ngày bắt đầu làm việc</label>
                    <input type="date" name="start_date" class="form-control" style="width: 20%">
                  </div>
                  <div class="mb-3">
                    <label>Số năm kinh nghiệm làm việc</label>
                    <input type="text" name="expe" class="form-control" style="width: 20%">
                  </div>
                  <div class="mb-3">
                    <label>Khoa</label>
                    <input type="text" name="faculty" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label>Làm việc tại tòa</label>
                    <input type="text" name="build_id" class="form-control" style="width: 20%">
                    <label>Làm việc tại phòng</label>
                    <input type="text" name="room_id" class="form-control" style="width: 20%;">
                  </div>
                  <div class="mb-3">
                    <button type="submit" name="save_doctor" class="btn btn-primary">Lưu</button>
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